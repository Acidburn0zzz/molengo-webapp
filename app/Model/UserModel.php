<?php

namespace Model;

class UserModel extends AppModel
{

    use \Molengo\Model\UserModel;

    /**
     * Returns user by id
     *
     * @param int $id
     * @return array
     */
    public function getById($id)
    {
        $result = array();

        $db = $this->getDb();
        $sql = "SELECT * FROM user WHERE id={id};";

        $fields = array();
        $fields['id'] = $id;

        $sql = $db->prepare($sql, $fields);
        $result = $db->queryAll($sql);

        return $result;
    }

    /**
     *
     * @param string $value
     * @return array
     */
    public function getByValue($value)
    {
        $db = $this->getDb();

        $sql = "SELECT * FROM {table} WHERE value={value};";

        $fields = array();
        $fields['table'] = $db->escIdent('tablename');
        $fields['value'] = $db->esc($value);

        $sql = $db->prepare($sql, $fields, false);
        $result = $db->queryAll($sql);
        return $result;
    }

    /**
     * Demo for QueryBuilder
     *
     * @return void
     */
    public function demoQueryBuilder()
    {
        // Use Database Abstraction Layer (DBAL)
        $dba = $this->db->getDbal();

        // Equivalent to "INSERT INTO user (username, disabled) VALUES ('bob', '1')"
        $dba->insert('user', ['username' => 'bob', 'disabled' => 1]);

        // Equivalent to "UPDATE user SET username = 'bob' WHERE username = 'bob'"
        $dba->update('user', ['username' => 'max'], ['username' => 'bob']);

        // Equivalent to "DELETE FROM user WHERE username = 'max'"
        $dba->delete('user', ['username' => 'max']);

        // Use the SQL Query Builder
        $qb = $this->db->query();
        $rows = $qb->select('id', 'username')
                ->from('user')
                ->orderBy('username', 'ASC')
                ->execute()
                ->fetchAll();

        $qb = $this->db->query();
        $query = $qb->select('u.id', 'u.username')
                ->from('user', 'u')
                ->where('u.id = :id')
                ->setParameter('id', 1);
        $sql = $query->getSQL();
        $result = $query->execute()->fetchAll();

        $params = array(
            'id' => 2
        );
        $qb = $this->db->query();
        $query2 = $qb->select('u.id', 'u.username')
                ->from('user', 'u')
                ->where('u.id = :id')
                ->setParameters($params);

        $sql2 = $qb->getSQL();
        $result2 = $query2->execute()->fetchAll();

        return $result;
    }

}
