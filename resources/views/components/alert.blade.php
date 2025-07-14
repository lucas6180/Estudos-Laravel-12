 <div
     class="campo-alerta absolute  w-full h-[950px] flex justify-center py-6 backdrop-blur-sm bg-slate-950 bg-opacity-20 hidden ">
     <div class="erros relative bg-slate-700 w-[350px] h-[180px] flex flex-col items-center p-4 rounded-sm shadow-lg">
         <div class="aviso w-full h-[35px] flex gap-2 items-center">
             <img class="w-[25px]" src="{{ asset('images/icon-alerta.png') }}" alt="">
             <p class="font-medium text-white">Aviso</p>
         </div>
         <div class="conteudo-aviso w-full h-[95px] flex items-center justify-center p-2">
             <p class="font-medium"></p>
         </div>
         <div class="w-full h-[45px] flex items-center justify-center">
             <button class="botao-ok bg-red-500 hover:bg-red-600 w-[80px] h-[35px] rounded-sm">Ok</button>
         </div>
     </div>
 </div>

 @vite('resources/js/alertas.js')
 @vite('resources/js/deleteLivro.js')
