<?php
interface Persistable{
    public function load($id);
    public function update($id);
    public function remove($id);
}