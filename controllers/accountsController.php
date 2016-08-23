<?php

class Accounts extends AppController {
    // Usar SQL con dos tablas en vez de la clase PDO.
    private $sql = "SELECT accounts.id id, accounts.name name, users.username user_id FROM accounts JOIN users ON accounts.user_id = users.id";
    public function index() {
        $accounts = $this->db->connection->query($this->sql);
        //$accounts = $this->db->find("accounts", "all");
        $this->set("accounts", $accounts);
    }
    public function add() {
        if ($_POST) {
            if ($this->db->save("accounts", $_POST)) {
                $this->redirect(array("controller"=>"accounts"));
            } else  {
                $this->redirect(array("controller"=>"accounts", "action"=>"add"));
            }
        }
        $users = $this->db->find("users", "all");
        $this->set("users", $users);
    }
    public function edit($args) {
        if ($_POST) {
            if ($this->db->update("accounts", $_POST)) {
                $this->redirect(array("controller"=>"accounts"));
            } else  {
                $this->redirect(array("controller"=>"accounts", "action"=>"edit/".$args[0]));
            }
        }
        $account = $this->db->find("accounts", "first", array("conditions"=>"accounts.id=".$args[0]));
        $this->set("account", $account);
        $users = $this->db->find("users", "all");
        $this->set("users", $users);
    }
    public function delete($args) {
        if ($_POST || isset($_POST["id"])) {
            try {
                if ($this->db->delete("accounts", "accounts.id=".$_POST["id"])) {
                    $this->redirect(array("controller"=>"accounts"));
                }
            }
            catch (PDOException $e) {
                $this->redirect(array("controller"=>"accounts", "action"=>"locked/".$_POST["id"]));
            }
        }
        $account = $this->db->find("accounts", "first", array("conditions"=>"accounts.id=".$args[0]));
        $this->set("account", $account);
    }

    public function locked($args) {
        $account = $this->db->find("accounts", "first", array("conditions"=>"accounts.id=".$args[0]));
        $this->set("account", $account);
    }
}