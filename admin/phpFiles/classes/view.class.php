<?php

    class View extends Model {
        public function updateDbView($selector, $column, $value1, $column1, $value2, $column2, $value3, $column3, $value4, $column4, $value5, $column5, $value6, $column6, $value7, $column7, $table) {
            return $this->updateDb($selector, $column, $value1, $column1, $value2, $column2, $value3, $column3, $value4, $column4, $value5, $column5, $value6, $column6, $value7, $column7, $table);
        }
        public function updateDb2View($selector, $column, $value, $column1, $table) {
            return $this->updateDb2($selector, $column, $value, $column1, $table);
        }
    }

?>