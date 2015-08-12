<?php
    class User extends Model
    {
        protected static $rules = ['name' => 'required',
                                   'mail' => 'required|email'];

    }