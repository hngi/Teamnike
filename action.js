//solar app script written by celxkodez


//DOM variables 
//inputs 
let electronic = document.querySelector('#electronic');
let power_use = document.querySelector('#power_use');
let hours_use = document.querySelector('#hours_use');
let electDetails = document.querySelector('#electDetails');


//FOR THE EDIT FEATURES
//inputs
let elect_edit = document.querySelector('#elect_edit');
let power_edit = document.querySelector('#power_edit');
let hours_edit = document.querySelector('#hours_edit');

//divs 
let inputDiv = document.querySelector('.inputform');
let editInputDiv = document.querySelector('.outputform');



//output button
let calcu_btn = document.querySelector('#calcu_btn');

//result 
let domtotal = document.querySelector('#total');

//add button
let add_btn = document.querySelector('#add_btn');
let edit_btn = document.querySelector('#edit_btn');

//output variables
let result = document.querySelector('#result');

//total computation variable
let totalcomp = 0;

//array for the value storage
let powerarr = [];
let hoursarr = [];
let powerTotal = 0;

//from objects
let powerObj = [];

//elements id counter
let elId = 0;
//elem mother div


//this addes the users data from the inputs boxes to the div
let addItems = () => {
   // powerTotal = 0;
    let power = power_use.value;
    let electName = electronic.value;
    let hours = hours_use.value;

    // parses interger to the these variables
    let powerval = parseFloat(power);
    let hoursInt = parseInt(hours);



    if(powerval && hoursInt && electName.length){
        elId = powerObj.length;
        //let elId = 0;
        let editBtn = `
        <button id = "" class="btn btn-danger editbtn" onclick="edit(this.id);">Edit</button>
        `;
        let deleteBtn = `<span class="toooltiptext">
        <button id ="" class="btn btn-danger delbtn" onclick="deletfunc(this.id);">Delete</button>
        ${editBtn}
        </span>`;
        
        
        //for the electronic name
        let elect = document.createElement('span');
        elect.innerHTML = electName;
        //elect.id = 'electron';
        elect.className = 'left electname';

        //for the individual power vairable
        let powercount = document.createElement('span');
        powercount.innerHTML = `${power}watts ${deleteBtn}`;
        powercount.className = 'right watt';
    
     
        
        let div = document.createElement('div');
        div.className = 'cont';
        div.id = elId;

        electDetails.appendChild(div);
        //div.appendChild(elect);
        div.appendChild(elect);
        div.append('=');
        div.appendChild(powercount);

        //let 

        let testobj = {hours: hoursInt, power: powerval};
        powerObj.push( testobj);
        //let powe = {hoursInt}
        //let hou = {powerval}
        //testobj.push(powe);
        //testobj.push(hou);


        //hoursarr.push(hoursInt);
        //powerarr.push(powerval);
        //console.log(powerObj);

        powersum();
        calcu_function()
        power_use.value = '';
        electronic.value = '';
        hours_use.value = '';
        
        /*FOR ONLY DEBUGGING PURPOSES */
        //console.log('that works');
        //console.log(powerarr);
        //console.log(hoursarr);
        //console.log(powerTotal);
    }
    //domtotal.innerHTML = `${powerTotal}watts`;
    //powerTotal = 0;
    assignId();
    //assignId();
    //return powerTotal = 0;
}

function powersum(){
    powerTotal = 0;
    for (let i = 0; i < powerObj.length; i++) {

        powerTotal = powerTotal + powerObj[i].power;
       // powerTotal = powerTotal + powerarr[i];
        //return powerTotal;

        //for debuging purposes
        //console.log('got up to this point')
    }
    domtotal.innerHTML = `${powerTotal}watts`;
}
 function assignId(){
    let idnum = 0;
    let cont = document.querySelectorAll('.cont');
    let editbtn = document.querySelectorAll('.editbtn');
    let butts = document.querySelectorAll('.delbtn');
    let electname = document.querySelectorAll('.electname');
    let watt = document.querySelectorAll('.watt');

    for (let i = 0; i < butts.length; i++){
        butts[i].id = idnum;
        cont[i].id = idnum;
        editbtn[i].id = idnum;
        electname[i].id = `electname${idnum}`;
        watt[i].id = `watt${idnum}`;

        idnum ++;
    }

    //let domtotal = document.querySelector('#total');
    //domtotal.innerHTML = `${powerTotal}watts`;
    // console.log('on click works here');
 }
 

 //total computation function
function calcu_function(){
    totalcomp = 0;
    //result.innerHTML = "";
    for (let i = 0; i < powerObj.length; i++){
        totalcomp += powerObj[i].hours * powerObj[i].power;

    }

    //console.log(`total comp here ${totalcomp}`);

    result.innerHTML = `${totalcomp}watts`;

    //for debugging purposes
    //console.log('got up to here');

}

function deletfunc(x){
    //powersum();
    //calcu_function();
    let id = `${x}`;
    let ids = document.getElementById(id);
    let idnumeber = ids.id ;
    let re = parseInt(idnumeber);
    powerObj.splice(re,1);
    ids.remove();

    //ids.id
    //let re = this.x - this.x;

    //debugging purposes
    //console.log(re);
    //console.log(`this is re value ${re}`);
    //console.log(power_use);
    //console.log(idnumeber);
    //console.log(ids);
    assignId();
    powersum();
}

//strickly for save button only
let saveval = 0;
function edit(y){
    

    inputDiv.classList.add('hidden');
    editInputDiv.classList.remove('hidden');
    //assignId();
    let id = y;
    let ids = document.getElementById(id);
    let idnumeber = ids.id ;
    let re = parseInt(idnumeber);
    let electname = document.getElementById(`electname${re}`);
    let watt = document.getElementById(`watt${re}`);

    elect_edit.value = electname.innerHTML;
    power_edit.value = powerObj[re].power;
    hours_edit.value = powerObj[re].hours;
    
    assignId();
    return saveval = re;
    //for debugging purpose
    //console.log(id);
    //console.log(re);
    //console.log('the edit feature function');

    //console.log(electname);
    //console.log(watt);
    
}

function edit_save(){
    let electname = document.getElementById(`electname${saveval}`);
    let watt = document.getElementById(`watt${saveval}`);

    let editBtn = `
    <button id = "" class="btn btn-danger editbtn" onclick="edit(this.id);">Edit</button>
    `;
    let deleteBtn = `<span class="toooltiptext">
    <button id ="" class="btn btn-danger delbtn" onclick="deletfunc(this.id);">Delete</button>
    ${editBtn}
    </span>`;


    electname.innerHTML = `${elect_edit.value}`;
    powerObj[saveval].power = parseInt(power_edit.value);
    powerObj[saveval].hours = parseFloat(hours_edit.value);

    watt.innerHTML = `${power_edit.value}watts${deleteBtn}`;
    //electname.innerHTML = elect_edit.value;
    //power_edit.value = powerObj[re].power;
   // hours_edit.value = powerObj[re].hours;
    inputDiv.classList.remove('hidden');
    editInputDiv.classList.add('hidden');
    assignId();
    powersum();
    elect_edit.value = '';
    power_edit.value = '';
    hours_edit.value = '';

}

//events listeners right here 
add_btn.addEventListener('click', addItems);
edit_btn.addEventListener('click', edit_save);