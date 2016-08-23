<?php

class Categories extends AppController {

    public function index() {
        $categories = $this->db->find("categories", "all");
        $this->set("categories", $categories);
    }
    public function add() {
        if ($_POST) {
            if ($this->db->save("categories", $_POST)) {
                $this->redirect(array("controller"=>"categories"));
            } else  {
                $this->redirect(array("controller"=>"categories", "action"=>"add"));
            }
        }
    }
    public function edit($args) {
        if ($_POST) {
            if ($this->db->update("categories", $_POST)) {
                $this->redirect(array("controller"=>"categories"));
            } else  {
                $this->redirect(array("controller"=>"categories", "action"=>"edit/".$_POST["id"]));
            }
        }
        $category = $this->db->find("categories", "first", array("conditions"=>"categories.id=".$args[0]));
        $this->set("category", $category);
    }
    public function delete($args) {
        if ($_POST || isset($_POST["id"])) {
            try {
                if ($this->db->delete("categories", "categories.id=".$_POST["id"])) {
                    $this->redirect(array("controller"=>"categories"));
                } else {
                    $this->redirect(array("controller"=>"categories", "action"=>"delete/".$_POST["id"]));
                }
            } catch (PDOException $e) {
                $this->redirect(array("controller"=>"categories", "action"=>"locked/".$_POST["id"]));
            }
        }
        $category = $this->db->find("categories", "first", array("conditions"=>"categories.id=".$args[0]));
        $this->set("category", $category);
    }

    public function locked($args) {
        $category = $this->db->find("categories", "first", array("conditions"=>"categories.id=".$args[0]));
        $this->set("category", $category);
    }
}
