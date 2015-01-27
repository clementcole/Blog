package main

import(
	"fmt" 
	"net/http"
	"io/ioutil" //this the 'http' package we'll be using to retrieve a page we'll only use 'ioutil' to make reading and printing the html page a little easier in this code

)

func main(){
	resp, err := http.Get("http://destinytracker.com/?lb=ps.com") //Handling errors in go, just incase the domain name is wrong, it will prompt the user to check the domain name

	fmt.Println("http transport error is:", err) 	
	body, err := ioutil.ReadAll(resp.Body)  //resp.Body is a reference to a stream of data. So we use the ioutil package to read it to memory
	fmt.Println("read error is:", err)
	fmt.Println(string(body)) //Now casting the html body to a string because go will hand it as a byte array

}
