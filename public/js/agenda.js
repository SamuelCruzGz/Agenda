
var cerrar = document.getElementsByClassName("close")[0]
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('agenda');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      businessHours: 
        {
        idName: 'evento',
        start: '09:00:00',
        end : '16:00:00',
        color : '#515',
        rendering : 'inverse-background',
        dow : [1,2,3,4,5]
        },

      locale : "es",

        dateClick:function(info) {
            var actual = new Date();
            if(info.date >= actual){
                evento.style.display = "block"

                cerrar.onclick = function(){
                    evento.style.display = "none"
                }
    
                
                var date = info.date
                document.getElementById("fecha").value=date
            }else{
                
                alert("Error: No se puede solicitar una cita en una fecha vencida");
            }
        }
    });
    
  
    calendar.render();
  });
  
  