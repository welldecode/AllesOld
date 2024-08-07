 <div  
     class="display responsive nowrap table-default rounded-xl border bg-white dark:bg-zinc-800 p-6 dark:border-zinc-600 overflow-hidden">
          <div class="inline-block min-w-full   overflow-x-auto">
             <table id="myTable" class="  min-w-full leading-normal  "  >
                 @if (!empty($head))
                     <thead
                         class="lqd-table-head border-b   dark:border-zinc-600 text-start text-4xs leading-tight uppercase tracking-wider font-medium text-label transition-border">
                         {{ $head }}
                     </thead>
                 @endif
                 @if (!empty($body))
                     <tbody class="list">
                         {{ $body }}
                     </tbody>
                 @endif
             </table>
             <ul class="pagination"></ul>
         </div>
 

 </div>
