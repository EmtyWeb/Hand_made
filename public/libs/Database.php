<?php
class Database extends PDO {
    public function __construct($DB_TYPE,$DB_HOST,$DB_NAME,$DB_USER,$DB_PASSWORD) {
        try {
            parent::__construct($DB_TYPE.":host=".$DB_HOST.";dbname=".$DB_NAME, $DB_USER, $DB_PASSWORD);
        } catch (PDOException $e) {
            throw new Database_Exception("D00002: " . $e->getMessage());
        }
    }

    /**
     * @param $sql - наш запрос
     * @param array $array
     * @param $fetchMode - PDO::FETCH_ASSOC
     * @return array - возвращаем результат
     *
     */
    public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC)
    {
        $STH = $this->prepare($sql);
        foreach ($array as $key => $value) {
            $STH->bindValue("$key", $value);
        }

        $STH->execute();
        return $STH->fetchAll($fetchMode);
    }
    /**
     * insert
     * @param $table название таблицы куда вставляются данные
     * @param $data данные которые вставляются
     */
    public function insert($table,$data){
        //Сортирует массив по ключам
        ksort($data);

        $Names = implode('`, `', array_keys($data));
        $Values = ':' . implode(', :', array_keys($data));
        ///echo $SQL = "INSERT INTO $table (`$Names`) VALUES ( $Values )";
        $STH = $this->prepare("INSERT INTO $table (`$Names`) VALUES ( $Values )");

        foreach ($data as $key => $value) {
            $STH->bindValue(":$key", $value);
        }

        $STH->execute();
    }
    /**
     * update
     * @param $table название таблицы куда вставляются данные
     * @param $data данные которые вставляются
     * @param $where куда вставлять данные
     */
    public function update($table,$data,$where){
        //Сортирует массив по ключам
        ksort($data);

        $Details = NULL;
        foreach($data as $key=> $value) {
            $Details .= "`$key`=:$key,";
        }
        $Details = rtrim($Details, ',');

        $STH = $this->prepare("UPDATE $table SET $Details WHERE $where");

        foreach ($data as $key => $value) {
            $STH->bindValue(":$key", $value);
        }

        $STH->execute();
    }

    /**
     * @param string $table  откуда удаляем
     * @param string $where по какому id
     * @param int $limit скодько записей
     * @return int возвращаем результат(удаляем)
     */
    public function delete($table, $where, $limit = 1)
    {
        return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
    }
}