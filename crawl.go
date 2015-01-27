package main

import (
	"fmt"
	"flag" //flags helps you parse command line arguments
	"os"  //gives you access to system calls
	"io/ioutil"
	"net/http"
	"github.com/jackdanger/collectlinks"
)

func main(){
	flag.Parse()  //This is what flags converts the command line into an argument to a new variable named 'args'
	args := flag.Args() //This is declaring a new variable an implicit way of declaring variables in golang
			    //at this point Args will eirther be empty if no command is inserted after running the program. 
			    //This will give an error due to the flag.Parse statement if no argument is placed in the args.
	fmt.Println(args)
	if len(args) < 1{
		fmt.Println("Please specify start page")
		os.Exit(1)
	}
	retrieve(args[0])

	
	}
	func retrieve(uri string){
		resp, err := http.Get(uri)
		if err != nil{
			return
		}
		defer resp.Body.Close()

		body, _ := ioutil.ReadAll(resp.Body) //I'm assuming the err to _ 'cause I don't care about it Go will whine if we name it and don't use it

		fmt.Println(string(body))




	}
