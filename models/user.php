<?php

class UserModel extends Model
{
    public function register()
    {
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post && $post['submit']) {
            if($post['name'] === '' || $post['email'] === '' || $post['password'] === '') {
                Messages::setMsg('Please Fill In All Fields', 'error');
                return;
            }

            $password = md5($post['password']);
            // Insert into DB
            $this->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
            $this->bind(':name', $post['name']);
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);
            $this->execute();

            // Verify
            if ($this->lastInsertId()) {
                header('Location: '.ROOT_URL.'users/login');
            }
        }
        return;
    }

    public function login()
    {
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post && $post['submit']) {
            $password = md5($post['password']);
            // Compare Login
            $this->query('SELECT * FROM users WHERE email = :email AND password = :password');
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);
            $this->execute();

            $row = $this->single();
            if($row) {
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user_data'] = [
                    'id'    => $row['id'],
                    'name'  => $row['name'],
                    'email' => $row['email']
                ];
                header('Location: '.ROOT_URL.'shares');
            } else {
                Messages::setMsg('Incorrect Login', 'error');
            }
        }
        return;
    }
}