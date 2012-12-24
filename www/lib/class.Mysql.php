<?php

if(!defined('_LIB_DB_MYSQL_LOADED'))
{
    define('_LIB_DB_MYSQL_LOADED', true);

    if(!defined('_DBMYSQL_SHOW_ERROR_MESSAGES'))
        define('_DBMYSQL_SHOW_ERROR_MESSAGES', true);

    class DB
    {
        var $dbHost = '';        // hostname of the MySQL server
        var $dbName = '';        // logical database name on that server
        var $dbUser = '';        // database authorized user
        var $dbPass = '';        // user's password
        var $linkId = 0;        // last result of mysql_connect()
        var $record    = array();    // last record fetched
        var $charset = 'cp1251';
        var $queryId = 0;        // last result of mysql_query()
        var $currentRow;        // current row number
        var $errorNumber = 0;    // last error number
        var $errorMessage = '';    // last error message
        var $errorLocation = '';// last error location
        var $queryCount = 0;// number of queries
        var $queryTime = 0;// time of mysql job

        function DB($dbHost = 'localhost', $dbName = 'aktivsis_db', $dbUser = 'root', $dbPass = '', $charset = 'cp1251')
        {
            $time_start = $this->microtime_float();
            $this->dbHost = $dbHost;
            $this->dbName = $dbName;
            $this->dbUser = $dbUser;
            $this->dbPass = $dbPass;
            $this->charset = $charset;
            $time_end = $this->microtime_float();
            $this->queryTime += ($time_end - $time_start); 
        }

        function updateError($location)
        {
            $this->errorNumber = mysql_errno();
            $this->errorMessage = mysql_error();
            $this->errorLocation = $location;
            if($this->errorNumber && _DBMYSQL_SHOW_ERROR_MESSAGES)
            {
                echo('<br /><b>'.$this->errorLocation.'</b><br />'.$this->errorMessage);
                flush();
            }
        }

        function connect()
        {
            if($this->linkId == 0)
            {
                $this->linkId = mysql_connect($this->dbHost, $this->dbUser, $this->dbPass);
                if(!$this->linkId)
                {
                    exit();
                }
                $this->query("set session character_set_server=".$this->charset.";");
                $this->query("set session character_set_database=".$this->charset.";");
                $this->query("set session character_set_connection=".$this->charset.";");
                $this->query("set session character_set_results=".$this->charset.";");
                $this->query("set session character_set_client=".$this->charset.";");
                $this->queryCount = 0;
            }
            return true;
        }

        function query($queryString)
        {
            $time_start = $this->microtime_float();
            if(!$this->connect())
            {
                return false;
            }
            if(!mysql_select_db($this->dbName, $this->linkId))
            {
                $this->updateError('DB::connect()<br />mysql_select_db');
                return false;
            }
            $this->queryId = mysql_query($queryString, $this->linkId);
            $this->updateError('DB::query('.$queryString.')<br />mysql_query');
            if(!$this->queryId)
            {
                exit();
            } else { 
                $time_end = $this->microtime_float();
                $this->queryTime += ($time_end - $time_start); 
                $this->queryCount++; 
            }
            $this->currentRow = 0;
            return true;
        }

        function queryAllRecordsL($queryString)
        {
            if(!$this->query($queryString))
            {
                return false;
            }
            $ret = array();
            while($line = $this->nextRecord())
            {
                $ret[] = $line;
            }
            return $ret;
        }

        function queryAllRecords($queryString)
        {
            if(!$this->query($queryString))
            {
                return false;
            }
            $ret = array();
            while($line = $this->nextRecordL())
            {
                $ret[] = $line;
            }
            return $ret;
        }

        function queryOneRecord($queryString)
        {
            if(!$this->query($queryString) || $this->numRows() != 1)
            {
                return false;
            }
            return $this->nextRecordL();
        }

        function nextRecordL()
        {
            $this->record = mysql_fetch_array($this->queryId);
            $this->updateError('DB::nextRecord()<br />mysql_fetch_array');
            if(!$this->record || !is_array($this->record))
            {
                return false;
            }
            $this->currentRow++;
            return $this->record;
        }
        
        function nextRecord()
        {
            $this->record = mysql_fetch_array($this->queryId, MYSQL_ASSOC);
            $this->updateError('DB::nextRecord()<br />mysql_fetch_array');
            if(!$this->record || !is_array($this->record))
            {
                return false;
            }
            $this->currentRow++;
            return $this->record;
        }

        function numRows()
        {
            return mysql_num_rows($this->queryId);
        }

        function cleanResults()
        {
            if($this->queryId != 0) mysql_freeresult($this->queryId);
        }

        function optimize($tbl_name)
        {
//            $this->connect();
            $this->queryId = @query("OPTIMIZE TABLE $tbl_name",$this->linkId);
        }

        function close()
        {
            if($this->linkId != 0) mysql_close($this->linkId);
        }
        
        function microtime_float() {
           list($usec, $sec) = explode(" ", microtime());
           return ((float)$usec + (float)$sec);
        }
    }
}
?>
