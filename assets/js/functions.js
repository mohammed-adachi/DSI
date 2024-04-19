
  function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
      color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
  }

  function intpush(p1) {

    var Data = []; 
    for ( y = 0; y < p1.length ; y++) {

        Data.push(parseInt(p1[y]));
    }
    return Data;   
  }

  function stringpush(p1) {

    var Data = []; 
    for ( y = 0; y < p1.length ; y++) {

        Data.push(p1[y]);
    }
    return Data;   
  }


  function colorpush(c1) {

    var colors = []; 
    for ( i = 0; i < c1.length ; i++) {
        var color1 = getRandomColor();
            colors.push(color1);
        
        }
    return colors;   
  }

  function chartdoughnut(id,labels,Color,data) {

    let my =document.getElementById(id).getContext('2d');
    let Chart1= new Chart(my,{
        type:'doughnut',
        data:{
            labels:labels,
              datasets: [{
                data:data,
                  backgroundColor:Color
            }]
        },
        options:{
            title:{
                display:true
            }
        }
    
    });	
}

function chartbar(id,labels,Color,data) {

var ctx = document.getElementById(id).getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Indice', 
            data: data,
            backgroundColor: Color,
            borderWidth: 1
        }]
    },
    options: {
    	scales: {
        	yAxes: [{
            	ticks: {
                	beginAtZero: true
            	}
        	}]
    	}
	}
});
}

function chartpie(id,labels,Color,data) {
    var ctx = document.getElementById(id).getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: labels,
       datasets: [{
        label: "Indice",
        backgroundColor: Color,
        data: data
      }]
    },
    options: {
      title: {
        display: true,
        text: ''
      }
    }
  });
}

function chartline(id,labels,data) {

    var ctx = document.getElementById(id).getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'line',
    data: {
    labels: labels,
    datasets: [
        {
            label: "function",
            borderColor: "#8e5ea2",
            fill: false,
            data:data
            
        }
        
    ]
},
options: {
  scales: {
      yAxes: [{
          ticks: {
              beginAtZero: true
          }
      }]
  }
}
});
}

function chartpolar(a,b,c,d) {
    var ctx = document.getElementById(a).getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'polarArea',
        data: {
          labels:b,
          datasets: [
            {
              label: "Indice",
              backgroundColor: d,
              data: c
            }
          ]
        },
        options: {
          title: {
            display: true,
            text: ' '
          }
        }
    });
}

function horizontalBar(a,b,c,d) {
    var ctx = document.getElementById(a).getContext('2d');
    var myChart = new Chart(ctx, {
type: 'horizontalBar',
    data: {
      labels: b,
      datasets: [
        {
          label: "Indice",
          backgroundColor: d,
          data: c
        }
      ]
    },
    options: {
    	scales: {
        	xAxes: [{
            	ticks: {
                	beginAtZero: true
            	}
        	}]
    	}
	}
});
}
function groupedBar(id,labels,data1,data2) {
  var ctx = document.getElementById(id).getContext('2d');
  var myChart = new Chart(ctx, {

type: 'bar',
    data: {
      labels: labels,
      datasets: [
        {
          label: "en panner",
          backgroundColor: "#3e95cd",
          data: data1
        }, {
          label: "no en panner",
          backgroundColor: "#8e5ea2",
          data: data2
        }
      ]
    },
    options: {
    	scales: {
        	yAxes: [{
            	ticks: {
                	beginAtZero: true
            	}
        	}]
    	}
	}
});
}

function animateValue(obj, start, end, duration) {
  let startTimestamp = null;

  const step = (timestamp) => {
    if (!startTimestamp) startTimestamp = timestamp;
    const progress = Math.min((timestamp - startTimestamp) / duration, 1);
    document.getElementById(obj).innerHTML = Math.floor(progress * (end - start) + start);
    if (progress < 1) {
      window.requestAnimationFrame(step);
    }
  };

  window.requestAnimationFrame(step);
}