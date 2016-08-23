<?php

class Transactions extends AppController {
    // using handwritten SQL for multiple table join.
    private $sql = "SELECT t.id AS id, t.amount AS amount, t.date AS `date`, c.name AS category_id, a.name AS account_id, t.description AS description FROM transactions t JOIN accounts a ON t.account_id = a.id JOIN categories c ON t.category_id = c.id ORDER BY id DESC";
    public function index() {
        //$transactions = $this->db->find("transactions", "all");
        $transactions = $this->db->connection->query($this->sql);
        $this->set("transactions", $transactions);
    }
    public function add() {
        if ($_POST) {
            if ($this->db->save("transactions", $_POST)) {
                $this->redirect(array("controller"=>"transactions"));
            } else  {
                $this->redirect(array("controller"=>"transactions", "action"=>"add"));
            }
        }
        $categories = $this->db->find("categories", "all");
        $accounts = $this->db->find("accounts", "all");
        $this->set("categories", $categories);
        $this->set("accounts", $accounts);
    }
    public function edit($args) {
        if ($_POST) {
            if ($this->db->update("transactions", $_POST)) {
                $this->redirect(array("controller"=>"transactions"));
            } else  {
                $this->redirect(array("controller"=>"transactions", "action"=>"edit/".$args[0]));
            }
        }
        $transaction = $this->db->find("transactions", "first", array("conditions"=>"transactions.id=".$args[0]));
        $this->set("transaction", $transaction);
        $categories = $this->db->find("categories", "all");
        $accounts = $this->db->find("accounts", "all");
        $this->set("categories", $categories);
        $this->set("accounts", $accounts);
    }
    public function delete($args) {
        if ($_POST || isset($_POST["id"])) {
            try {
                if ($this->db->delete("transaction", "transactions.id=".$_POST["id"])) {
                    $this->redirect(array("controller"=>"transactions"));
                }
            }
            catch (PDOException $e) {
                $this->redirect(array("controller"=>"transactions", "action"=>"locked/".$_POST["id"]));
            }
        }
        $transaction = $this->db->find("transactions", "first", array("conditions"=>"transactions.id=".$args[0]));
        $this->set("transaction", $transaction);
    }
}