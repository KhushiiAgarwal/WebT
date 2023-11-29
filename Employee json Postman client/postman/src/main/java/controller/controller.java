package controller;
import org.springframework.core.io.FileSystemResource; //to work with local files 
import com.fasterxml.jackson.databind.ObjectMapper; //part of the Jackson library, which is commonly used in Java for working with JSON data
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;

import java.io.IOException;
import java.util.ArrayList;
import java.util.List;
import java.util.Map;


@Controller
public class controller {

    private final ObjectMapper objectMapper;
    private final FileSystemResource jsonResource; // Resource for the JSON file in classpath


    public controller(ObjectMapper objectMapper) {
        this.objectMapper = objectMapper; // object to work with json read/write
        this.jsonResource = new FileSystemResource("Data/clients.json"); //object for local file update path

    }

    @GetMapping("/show")
    public String show(Model model) throws IOException {
        // Read the JSON file from the classpath and pass the data to the Thymeleaf template
        Map<String, Object> jsonData = objectMapper.readValue(jsonResource.getInputStream(), Map.class);
        model.addAttribute("jsonData", jsonData);
        return "index"; //html in templates "index.html"
    }
    
    @PostMapping("/add")
    public String addJson(@RequestBody Map<String, Object> newEmployee) throws IOException {
        // Print the received data to the console or log it
        System.out.println("Received data: " + newEmployee);

        // Read the existing JSON data from the file
        Map<String, Object> existingData;
        if (jsonResource.exists()) {
            existingData = objectMapper.readValue(jsonResource.getFile(), Map.class);
        } else {
            existingData = Map.of("employees", new ArrayList<>());
        }

        // Get the list of existing employees
        List<Map<String, Object>> employees = (List<Map<String, Object>>) existingData.get("employees");

        // Add the new employee to the list
        employees.add(newEmployee); // add json obj to jsonfile

        // Write the merged data back to the file
        objectMapper.writeValue(jsonResource.getFile(), existingData);

        return "redirect:/show";
    }
    
    @DeleteMapping("/delete")
    public String deleteJson(@RequestBody Map<String, Object> deleteRequest) throws IOException {
        // Print the received data to the console or log it
        System.out.println("Received delete request: " + deleteRequest);

        // Read the existing JSON data from the file
        Map<String, Object> existingData;
        if (jsonResource.exists()) {
            existingData = objectMapper.readValue(jsonResource.getFile(), Map.class);
        } else {
            // If the file doesn't exist, there's nothing to delete
            return "redirect:/show";
        }

        // Get the list of existing employees
        List<Map<String, Object>> employees = (List<Map<String, Object>>) existingData.get("employees");

        // Get the ID to be deleted from the request body
        Object idToDelete = deleteRequest.get("id");

        // Remove the employee with the specified ID
        employees.removeIf(employee -> idToDelete != null && idToDelete.equals(employee.get("id")));

        // Write the updated data back to the file
        objectMapper.writeValue(jsonResource.getFile(), existingData);

        return "redirect:/show";
    }

}
