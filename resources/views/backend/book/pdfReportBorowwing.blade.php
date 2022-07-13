<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hisobot</title>
    <link rel="stylesheet" href="{{asset('/assets-frontend/css/bootstrap.min.css')}}">
</head>
  <body>
   
    
    <div class="container">
      
        <h4 style="text-align: center">
            "Xoja Buxoriy" o'rta maxsus islom bilim yurti Axborot-resurs markazidan olingan kitoblar to'g'risida ma'lumot
        </h4>
        
            <table id="dashboard_datatable" class="table table-bordered table-hover">
              <thead>
                <tr>
                  {{-- <th style="text-align: center">T/r</th><th style="text-align: center">Adabiyotlar turi</th><th style="text-align: center">Umumiy soni</th> --}}
                </tr>
              </thead>
              <tbody>
                 
                @php $i=1; @endphp
                @foreach($bookcategories as $bookcategory)
                
                  <tr>
                    <td style="text-align: center">{{$i++}}</td>
                    <td>{{$bookcategory->name}}</td>
                    
                    <td style="text-align: center">
                     <?php  
                        unset($arrz);  
                        $arrz=[]; 
                      ?>
                     @foreach($brbooks as $brbook)
                        
                      @if($bookcategory->id == $brbook->getBook['category'])
                      <?php 
                        $arrz[]=$brbook->getBook['category'];
                        ?>
                       
                      @endif
                       
                     @endforeach
                      {{count($arrz)}}
                    <?php  
                        unset($arrz);  
                      ?>
                    </td>

                  </tr>
                @endforeach 

                <tr>
                  <td style="text-align: center"><b>Jami</b></td>
                  <td style="text-align: center" colspan="2"><b>{{count($brbooks)}}</b></td>
                </tr>
              </tbody>
            </table>
        </div>

    </div>
  </body>
</html>