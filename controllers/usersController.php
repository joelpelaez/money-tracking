<?php
class Users extends AppController {
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $users = $this->db->find("users");
        $this->set("users", $users);
    }

    public function add() {
        if ($_SESSION["rol"] == "admin") {
            if ($_POST) {
                $filter = new Validations();
                $pass = new Password();

                $_POST["password"] = $filter->sanitizeText($_POST["password"]);
                $_POST["password"] = $pass->getPassword($_POST["password"]);

                if ($this->db->save("users", $_POST)) {
                    $this->redirect(array("controller"=>"users"));
                } else {
                    $this->redirect(array("controller"=>"users", "action"=>"add"));
                }
            }
        } else {
            $this->redirect(array("controller"=>"users"));
        }
    }

    public function edit($args) {
        if ($_POST) {
            $filter = new Validations();
            $pass = new Password();

            if (!empty($_POST["new_password"])) {
                $_POST["password"] = $filter->sanitizeText($_POST["new_password"]);
                $_POST["password"] = $pass->getPassword($_POST["password"]);
            }

            if ($this->db->update("users", $_POST)) {
                $this->redirect(array("controller"=>"users"));
            } else  {
                $this->redirect(array("controller"=>"users", "action"=>"edit/".$args[0]));
            }
        }
        $user = $this->db->find("users", "first", array("conditions"=>"users.id=".$args[0]));
        $this->set("user", $user);
    }

    public function delete($args) {
        if ($_POST || isset($_POST["id"])) {
            try {
                if ($this->db->delete("users", "users.id=".$_POST["id"])) {
                    $this->redirect(array("controller"=>"users"));
                }
            } catch (PDOException $e) {
                $this->redirect(array("controller"=>"users", "action"=>"locked/".$_POST["id"]));
            }
        }
        $user = $this->db->find("users", "first", array("conditions"=>"users.id=".$args[0]));
        $this->set("user", $user);
    }

    public function locked($args) {
        $user = $this->db->find("users", "first", array("conditions"=>"users.id=".$args[0]));
        $this->set("user", $user);
    }

    public function login() {
        if ($_POST) {
            $pass = new Password();
            $filter = new Validations();
            $auth = new Authorization();

            $username = $filter->sanitizeText($_POST["username"]);
            $password = $filter->sanitizeText($_POST["password"]);

            $options["conditions"] = " username = '$username'";
            $user = $this->db->find("users", "first", $options);

            if ($pass->isValid($password, $user["password"])) {
                $auth->login($user);
                $this->redirect(array("controller"=>"pages"));
            } else {
                echo "Usuario no valido";
            }
        }
    }

    public function logout() {
        $auth = new Authorization();
        $auth->logout();
    }

    public function show($args) {
        if (@!empty($args[0])) {
            $user_id = $args[0];
            $sql = "SELECT t.id AS id, t.amount AS amount, t.date AS `date`, c.name AS category_id, a.name AS account_id, t.description AS description FROM transactions t JOIN accounts a ON t.account_id = a.id JOIN categories c ON t.category_id = c.id WHERE a.user_id = $user_id ORDER BY id DESC";
            $transactions = $this->db->connection->query($sql);
            $this->set("transactions", $transactions);
        }
    }
}