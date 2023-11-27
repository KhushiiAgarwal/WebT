package com.example.Student_CRUD.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.example.Student_CRUD.entity.Student;

public interface StudentRepository extends JpaRepository<Student, Long>{

}