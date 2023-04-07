// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["A+", "A-", "B+","B-","AB+", "AB-", "O+","O-"],
    datasets: [{
      data: [
        "{{$availableBloodUnits['A+']}}",
        "{{$availableBloodUnits['A+']}}",
        "{{$availableBloodUnits['A+']}}",
        "{{$availableBloodUnits['A+']}}",
        "{{$availableBloodUnits['A+']}}",
        "{{$availableBloodUnits['A+']}}",
        "{{$availableBloodUnits['A+']}}",
        "{{$availableBloodUnits['A+']}}"],
      backgroundColor: ['#4E73DF', '#D2691E', '#E74A3B','#F6C23E','#9932CC','#00FFFF','#1CC88A','#36B9CC'],
      hoverBackgroundColor: ['#3d60ca','#b15716','#be3529','#ac8932','#7d23aa','#11d1d1','#17a571','#44919c',],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 60,
  },
});
