
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('css/myChart.css')}}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div style="display: flex; justify-content: center;">
    <div style="width: 40%;">
        <canvas id="myChart" style="    height: 500px;width: 500px;"></canvas>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

     
 <script>
let e = @json($result);
let keys = Object.keys(e);
let values = Object.values(e);

const data = {
  labels: 
    keys
  ,
  
  datasets: [{
    label: 'My First Dataset',
    
    data: values ,
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 4
  }]
};








const config = {
  type: 'pie',
  data: data,
};

var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>

</body>
</html>














