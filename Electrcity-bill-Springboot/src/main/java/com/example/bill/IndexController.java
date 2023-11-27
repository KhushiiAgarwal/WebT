package com.example.bill;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;

@Controller
public class IndexController {
	@GetMapping("/electricity-bill")
	 public String showElectricityBillPage() {
		return "electricity-bill";
	 }
	@PostMapping("/calculate-bill")
	 @ResponseBody
	 public String calculateElectricityBill(@RequestParam("units") int units) {
		 double billAmount = 0.0;
		 if (units <= 50) {
			 billAmount = units * 3.50;
		 } else if (units <= 150) {
			 billAmount = 50 * 3.50 + (units - 50) * 4.00;
		 } else if (units <= 250) {
			 billAmount = 50 * 3.50 + 100 * 4.00 + (units - 150) * 5.20;
		 } else {
			 billAmount = 50 * 3.50 + 100 * 4.00 + 100 * 5.20 + (units - 250) * 6.50;
		 }
		 	return String.format("%.2f", billAmount);
	 }
}
