<?php

class ShareModel extends Model
{
    public function Index()
    {
        $this->query('SELECT * FROM shares ORDER BY create_date DESC');

        return $this->resultSet();
    }
    public function add()
    {
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post && $post['submit']) {
            if($post['title'] === '' || $post['body'] === '' || $post['link'] === '') {
                Messages::setMsg('Please Fill In All Fields', 'error');
                return;
            }

            // Insert into DB;
            $this->query('INSERT INTO shares (title, body, link, user_id) VALUES(:title, :body, :link, :user_id)');
            $this->bind(':title', $post['title']);
            $this->bind(':body', $post['body']);
            $this->bind(':link', $post['link']);
            $this->bind(':user_id', 1);
            $this->execute();

            // Verify
            if($this->lastInsertId()) {
                header('Location: '.ROOT_URL.'shares');
            }
            return;
        }
    }
}