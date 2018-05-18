
//function to find the days between 2 dates entered into the function
function days_between_dates(date1,date2){
    var diff =  Math.floor(( Date.parse(date1) - Date.parse(date2) ) / 86400000);
}
//function that adds element to th list
function add_to_list(){
    var list1 = document.createElement("li");
    var list2 = document.createElement("li");
    var list3 = document.createElement("li");
    var inputValue = document.getElementById("task").value;
    var dateValue = document.getElementById("deadline_date").value;
    var currentValue = document.getElementById("current_date").value;
    var t1 = document.createTextNode(inputValue);
    var t2 = document.createTextNode(dateValue);
    var t3 = document.createTextNode(currentValue);
    var checkbox = document.createElement("input");
    checkbox.type = "checkbox";
    document.getElementById("ul4").appendChild(checkbox);

    //appending the strings to the lists
    list1.appendChild(t1);
    list2.appendChild(t2);
    list3.appendChild(t3);

    //appending the lists to ul values
    document.getElementById("ul1").appendChild(list1);
    document.getElementById("ul2").appendChild(list2);
    document.getElementById("ul3").appendChild(list3);

    //clearing the task after pressing submit
    document.getElementById("task").value="";






}

