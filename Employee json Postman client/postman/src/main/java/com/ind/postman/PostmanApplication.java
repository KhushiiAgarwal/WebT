package com.ind.postman;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.ComponentScan;

@SpringBootApplication
@ComponentScan(basePackages = "controller")
public class PostmanApplication {

	public static void main(String[] args) {
		SpringApplication.run(PostmanApplication.class, args);
	}

}
