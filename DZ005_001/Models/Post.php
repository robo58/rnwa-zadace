<?php


class Post
{
    public $post_id;
    public $post_content;
    public $post_author_id;
    public $post_author_name;
    public $post_time;

    /**
     * Post constructor.
     * @param $post_id
     * @param $post_content
     * @param $post_author_id
     * @param $post_time
     */
    public function __construct($post_id, $post_content,$post_author_name, $post_author_id, $post_time)
    {
        $this->post_id = $post_id;
        $this->post_content = $post_content;
        $this->post_author_id = $post_author_id;
        $this->post_author_name = $post_author_name;
        $this->post_time = $post_time;
    }




    public static function all() {
        $list = [];
        $req = Database::query("SELECT p.*, r.rid, CONCAT(r.fname, ' ', r.lname) AS fullname FROM post p INNER JOIN registration r ON p.rid=r.rid");
        foreach($req as $post) {
            $list[] = new Post($post['pid'], $post['pcontent'],$post['fullname'], $post['rid'], $post['time']);
        }
        return $list;
    }

    public static function find($pid) {
        $pid = intval($pid);
        $req = Database::query("SELECT p.*, r.rid, CONCAT(r.fname, ' ', r.lname) AS fullname FROM post p INNER JOIN registration r ON p.rid=r.rid where p.pid = $pid");
        $post = $req[0];
        return new Post($post['pid'], $post['pcontent'],$post['fullname'], $post['rid'], $post['time']);
    }

    public static function updateorders($post,$productCode,$quantityOrdered,$priceEach,$orderLineNumber) {
        $db = Db::getInstance();
        $post = intval($post);
        $quantityOrdered = intval($quantityOrdered);
        $priceEach = intval($priceEach);
        $orderLineNumber = intval($orderLineNumber);
        $sql="UPDATE orderdetails SET quantityOrdered = '$quantityOrdered', priceEach='$priceEach', orderLineNumber = '$orderLineNumber'
       WHERE orderNumber = '$post' 
       AND productCode = '$productCode'";
        $db->query($sql);
    }



    public static function save($rid, $pcontent)
    {
        return Database::query("insert into post (pcontent, rid) values ('$pcontent', '$rid')");
    }

    public static function update($pid, $rid, $pcontent)
    {
        return Database::query("update post set pcontent = '$pcontent', rid = '$rid' where pid = '$pid'");
    }


}