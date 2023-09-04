array = [];
function amountOfSails(id) {
  const request = new XMLHttpRequest(); //create new request
  request.open("GET", "./stas.php?id="+id); //set request as a GET method connecting to users.php
  request.onload = function () {
      if (this.status == 200) {
        array.push(this.responseText);
      }

  }
  request.send(); 
}
const idsToFetch = [34,103,9];
for (const id of idsToFetch) {
  amountOfSails(id);
}


window.onload= function(){

  setTimeout(()=>{
    
    (() => {
      'use strict'
    
      // Graphs
      const ctx = document.getElementById('myChart')
      // eslint-disable-next-line no-unused-vars
      const myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: [
            'Sunday',
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday'
          ],
          datasets: [{
            data: [
              array[0],
              array[1],
              2,
              3,
              5
             
            ],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          plugins: {
            legend: {
              display: false
            },
            tooltip: {
              boxPadding: 3
            }
          }
        }
      })
    })()
  
  },100);
  /* globals Chart:false */
  
    
}
