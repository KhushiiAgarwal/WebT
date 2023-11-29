package com.example.bookstore.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.example.bookstore.entity.book;

public interface bookRepository extends JpaRepository<book,Long>{

}
