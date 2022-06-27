<?php

class Currency extends mysqli
{
    private $currency_csv = false;
    public function __construct()
    {
        parent::__construct("localhost", "root", "", "interview_test");
        if ($this->connect_error) {
            echo "Failed to connect to database" . $this->connect_error;
        }
    }
    public function import($file)
    {
        $file = fopen($file, "r");
        while ($row = fgetcsv($file)) {
            //var_dump($row);
            print "<pre>";
            print_r($row);
            print "</pre>";

            $value = "'" . implode("','", $row) . "'";
            $insertQuery = "INSERT INTO currency(iso_code,iso_numeric_code,common_name,official_name,symbol) VALUES(" . $value . ")";
            //echo $insertQuery;
            if ($this->query($insertQuery)) {
                $this->currency_csv = true;
            }
            else {
                $this->currency_csv = false;
            }

        }
        if ($this->country_csv) {
            echo "<script>alert('Successful')</script>";
        }
        else {
            echo "<script>alert('Not successful')</script>";
        }
    }
}
?>