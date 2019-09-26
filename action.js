//solar app script written by celxkodez


//DOM variables 
//inputs 
let electronic = document.querySelector('#electronic');
let power_use = document.querySelector('#power_use');
let hours_use = document.querySelector('#hours_use');
let electDetails = document.querySelector('#electDetails');



//output button
let calcu_btn = document.querySelector('#calcu_btn');

//add button
let add_btn = document.querySelector('#add_btn');

//output variables
let result = document.querySelector('#result');

//total computation variable
let totalcomp = 0;

//array for the value storage
let powerarr = [];
let hoursarr = [];
let powerTotal = 0;


//this addes the users data from the inputs boxes to the div
let addItems = () => {
    let power = power_use.value;
    let electName = electronic.value;
    let hours = hours_use.value;

    // parses interger to the these variables
    let powerval = parseFloat(power);
    let hoursInt = parseInt(hours);

    if(powerval && hoursInt && electName.length){
        let elect = document.createElement('span');

        let powercount = document.createElement('span');
        powercount.innerHTML = `${power}watts`;

        powercount.className = 'right';

        elect.innerHTML = electName;
        elect.className = 'left';


        let div = document.createElement('div');
        div.className = 'cont';

        electDetails.appendChild(div);
        div.appendChild(elect);
        div.appendChild(elect);
        div.append('=');
        div.appendChild(powercount);


        hoursarr.push(hoursInt);
        powerarr.push(powerval);

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
    let domtotal = document.querySelector('#total');
    domtotal.innerHTML = `${powerTotal}watts`;
}

function powersum(){
    for (let i = 0; i < powerarr.length; i++) {
        powerTotal += powerarr[i];
        return powerTotal;

        //for debuging purposes
        //console.log('got up to this point')
    }
}

function calcu_function(){
    //result.innerHTML = "";
    for (let i = 0; i < hoursarr.length; i++){
        totalcomp += powerarr[i] * hoursarr[i];

    }

    result.innerHTML = `${totalcomp}watts`;

    //for debugging purposes
    //console.log('got up to here');

}

//events listeners right here 
add_btn.addEventListener('click', addItems);