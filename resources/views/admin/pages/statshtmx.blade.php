
    <div class="grid grid-cols-12 gap-x-6">

        @foreach($yearlyData as $year => $months)
            @if($year > 1970)
                <div class="xl:col-span-12 col-span-12">
                    <div class="box">
                        <div class="justify-between text-center">
                            <p style="font-size: 1.3rem" class="box-title m-auto py-3 ">
                                Year {{ $year }}
                            </p>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-hover whitespace-nowrap table-bordered min-w-full">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="text-start">Month</th>
                                        <th scope="col" class="text-start">Purchase GEL</th>
                                        <th scope="col" class="text-start">Sales GEL</th>
                                        <th scope="col" class="text-start">COG</th>
                                        <th scope="col" class="text-start">Profit</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr class="border-t border-inherit border-solid hover:bg-gray-100 dark:hover:bg-light dark:border-defaultborder/10">
                                        <td scope="row" class="!text-start">
                                            Jan
                                        </td>
                                        <td>
                                        <span style="font-size: 1.5rem"
                                              class="badge bg-primary/10 text-primary ">
                                            @if( isset($months['Jan']['purchases']))
                                                {{ number_format($months['Jan']['purchases'], 2)  }}
                                            @endif
                                        </span>
                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Jan']['sales']) )
                                                {{ number_format( $months['Jan']['sales'], 2) }}
                                            @endif
                                        </span>

                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Jan']['COG']) )
                                                {{ number_format( $months['Jan']['COG'], 2) }}
                                            @endif
                                        </span>

                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Jan']['COG']) )
                                                {{ number_format($months['Jan']['sales'] - $months['Jan']['COG'], 2) }}
                                            @endif
                                        </span>

                                        </td>
                                    </tr>
                                    <tr class="border-t border-inherit border-solid hover:bg-gray-100 dark:hover:bg-light dark:border-defaultborder/10">
                                        <td scope="row" class="!text-start">
                                            Feb
                                        </td>
                                        <td>
                                        <span style="font-size: 1.5rem"
                                              class="badge bg-primary/10 text-primary ">
                                            @if( isset($months['Feb']['purchases']))
                                                {{ number_format($months['Feb']['purchases'], 2) }}
                                            @endif
                                        </span>
                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Feb']['sales']) )
                                                {{ number_format( $months['Feb']['sales'],2) }}
                                            @endif
                                        </span>

                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Feb']['COG']) )
                                                {{ number_format( $months['Feb']['COG'], 2) }}
                                            @endif
                                        </span>

                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Feb']['COG']) )
                                                {{ number_format($months['Feb']['sales'] - $months['Feb']['COG'], 2) }}
                                            @endif
                                        </span>

                                        </td>
                                    </tr>
                                    <tr class="border-t border-inherit border-solid hover:bg-gray-100 dark:hover:bg-light dark:border-defaultborder/10">
                                        <td scope="row" class="!text-start">
                                            Mar
                                        </td>
                                        <td>
                                        <span style="font-size: 1.5rem"
                                              class="badge bg-primary/10 text-primary ">
                                            @if( isset($months['Mar']['purchases']))
                                                {{   number_format($months['Mar']['purchases'],2) }}
                                            @endif
                                        </span>
                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Mar']['sales']) )
                                                {{  number_format($months['Mar']['sales'],2) }}
                                            @endif
                                        </span>

                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Mar']['COG']) )
                                                {{ number_format( $months['Mar']['COG'], 2) }}
                                            @endif
                                        </span>

                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Mar']['COG']) )
                                                {{ number_format($months['Mar']['sales'] - $months['Mar']['COG'], 2) }}
                                            @endif
                                        </span>

                                        </td>
                                    </tr>
                                    <tr class="border-t border-inherit border-solid hover:bg-gray-100 dark:hover:bg-light dark:border-defaultborder/10">
                                        <td scope="row" class="!text-start">
                                            Apr
                                        </td>
                                        <td>
                                        <span style="font-size: 1.5rem"
                                              class="badge bg-primary/10 text-primary ">
                                            @if( isset($months['Apr']['purchases']))
                                                {{  number_format($months['Apr']['purchases'],2) }}
                                            @endif
                                        </span>
                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Apr']['sales']) )
                                                {{  number_format($months['Apr']['sales'],2) }}
                                            @endif
                                        </span>

                                        </td>

                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Apr']['COG']) )
                                                {{ number_format( $months['Apr']['COG'], 2) }}
                                            @endif
                                        </span>

                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Apr']['COG']) )
                                                {{ number_format($months['Apr']['sales'] - $months['Apr']['COG'], 2) }}
                                            @endif
                                        </span>

                                        </td>
                                    </tr>
                                    <tr class="border-t border-inherit border-solid hover:bg-gray-100 dark:hover:bg-light dark:border-defaultborder/10">
                                        <td scope="row" class="!text-start">
                                            May
                                        </td>
                                        <td>
                                        <span style="font-size: 1.5rem"
                                              class="badge bg-primary/10 text-primary ">
                                            @if( isset($months['May']['purchases']))
                                                {{  number_format($months['May']['purchases'],2) }}
                                            @endif
                                        </span>
                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['May']['sales']) )
                                                {{  number_format($months['May']['sales'],2) }}
                                            @endif
                                        </span>

                                        </td>

                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['May']['COG']) )
                                                {{ number_format( $months['May']['COG'], 2) }}
                                            @endif
                                        </span>

                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['May']['COG']) )
                                                {{ number_format($months['May']['sales'] - $months['May']['COG'], 2) }}
                                            @endif
                                        </span>

                                        </td>
                                    </tr>
                                    <tr class="border-t border-inherit border-solid hover:bg-gray-100 dark:hover:bg-light dark:border-defaultborder/10">
                                        <td scope="row" class="!text-start">
                                            Jun
                                        </td>
                                        <td>
                                        <span style="font-size: 1.5rem"
                                              class="badge bg-primary/10 text-primary ">
                                            @if( isset($months['Jun']['purchases']))
                                                {{ number_format($months['Jun']['purchases'],2)  }}
                                            @endif
                                        </span>
                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Jun']['sales']) )
                                                {{ number_format($months['Jun']['sales'],2) }}
                                            @endif
                                        </span>

                                        </td>

                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Jun']['COG']) )
                                                {{ number_format( $months['Jun']['COG'], 2) }}
                                            @endif
                                        </span>

                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Jun']['COG']) )
                                                {{ number_format($months['Jun']['sales'] - $months['Jun']['COG'], 2) }}
                                            @endif
                                        </span>

                                        </td>
                                    </tr>
                                    <tr class="border-t border-inherit border-solid hover:bg-gray-100 dark:hover:bg-light dark:border-defaultborder/10">
                                        <td scope="row" class="!text-start">
                                            Jul
                                        </td>
                                        <td>
                                        <span style="font-size: 1.5rem"
                                              class="badge bg-primary/10 text-primary ">
                                            @if( isset($months['Jul']['purchases']))
                                                {{ number_format($months['Jul']['purchases'],2) }}
                                            @endif
                                        </span>
                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Jul']['sales']) )
                                                {{ number_format($months['Jul']['sales'],2) }}
                                            @endif
                                        </span>

                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Jul']['COG']) )
                                                {{ number_format( $months['Jul']['COG'], 2) }}
                                            @endif
                                        </span>

                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Jul']['COG']) )
                                                {{ number_format($months['Jul']['sales'] - $months['Jul']['COG'], 2) }}
                                            @endif
                                        </span>

                                        </td>
                                    </tr>
                                    <tr class="border-t border-inherit border-solid hover:bg-gray-100 dark:hover:bg-light dark:border-defaultborder/10">
                                        <td scope="row" class="!text-start">
                                            Aug
                                        </td>
                                        <td>
                                        <span style="font-size: 1.5rem"
                                              class="badge bg-primary/10 text-primary ">
                                            @if( isset($months['Aug']['purchases']))
                                                {{ number_format($months['Aug']['purchases'],2) }}
                                            @endif
                                        </span>
                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Aug']['sales']) )
                                                {{ number_format($months['Aug']['sales'],2) }}
                                            @endif
                                        </span>

                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Aug']['COG']) )
                                                {{ number_format( $months['Aug']['COG'], 2) }}
                                            @endif
                                        </span>

                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Aug']['COG']) )
                                                {{ number_format($months['Aug']['sales'] - $months['Aug']['COG'], 2) }}
                                            @endif
                                        </span>

                                        </td>
                                    </tr>
                                    <tr class="border-t border-inherit border-solid hover:bg-gray-100 dark:hover:bg-light dark:border-defaultborder/10">
                                        <td scope="row" class="!text-start">
                                            Sep
                                        </td>
                                        <td>
                                        <span style="font-size: 1.5rem"
                                              class="badge bg-primary/10 text-primary ">
                                            @if( isset($months['Sep']['purchases']))
                                                {{ number_format($months['Sep']['purchases'],2) }}
                                            @endif
                                        </span>
                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Sep']['sales']) )
                                                {{ number_format($months['Sep']['sales'],2) }}
                                            @endif
                                        </span>

                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Sep']['COG']) )
                                                {{ number_format( $months['Sep']['COG'], 2) }}
                                            @endif
                                        </span>

                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Sep']['COG']) )
                                                {{ number_format($months['Sep']['sales'] - $months['Sep']['COG'], 2) }}
                                            @endif
                                        </span>

                                        </td>
                                    </tr>
                                    <tr class="border-t border-inherit border-solid hover:bg-gray-100 dark:hover:bg-light dark:border-defaultborder/10">
                                        <td scope="row" class="!text-start">
                                            Oct
                                        </td>
                                        <td>
                                        <span style="font-size: 1.5rem"
                                              class="badge bg-primary/10 text-primary ">
                                            @if( isset($months['Oct']['purchases']))
                                                {{ number_format($months['Oct']['purchases'],2) }}
                                            @endif
                                        </span>
                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Oct']['sales']) )
                                                {{ number_format($months['Oct']['sales'],2) }}
                                            @endif
                                        </span>

                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Oct']['COG']) )
                                                {{ number_format( $months['Oct']['COG'], 2) }}
                                            @endif
                                        </span>

                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Oct']['COG']) )
                                                {{ number_format($months['Oct']['sales'] - $months['Oct']['COG'], 2) }}
                                            @endif
                                        </span>

                                        </td>
                                    </tr>
                                    <tr class="border-t border-inherit border-solid hover:bg-gray-100 dark:hover:bg-light dark:border-defaultborder/10">
                                        <td scope="row" class="!text-start">
                                            Nov
                                        </td>
                                        <td>
                                        <span style="font-size: 1.5rem"
                                              class="badge bg-primary/10 text-primary ">
                                            @if( isset($months['Nov']['purchases']))
                                                {{ number_format($months['Nov']['purchases'],2) }}
                                            @endif
                                        </span>
                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Nov']['sales']) )
                                                {{ number_format($months['Nov']['sales']),2 }}
                                            @endif
                                        </span>

                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Nov']['COG']) )
                                                {{ number_format( $months['Nov']['COG'], 2) }}
                                            @endif
                                        </span>

                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Nov']['COG']) )
                                                {{ number_format($months['Nov']['sales'] - $months['Nov']['COG'], 2) }}
                                            @endif
                                        </span>

                                        </td>
                                    </tr>
                                    <tr class="border-t border-inherit border-solid hover:bg-gray-100 dark:hover:bg-light dark:border-defaultborder/10">
                                        <td scope="row" class="!text-start">
                                            Dec
                                        </td>
                                        <td>
                                        <span style="font-size: 1.5rem"
                                              class="badge bg-primary/10 text-primary ">
                                            @if( isset($months['Dec']['purchases']))
                                                {{ number_format($months['Dec']['purchases'],2) }}
                                            @endif
                                        </span>
                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Dec']['sales']) )
                                                {{ number_format($months['Dec']['sales'],2) }}
                                            @endif
                                        </span>

                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Dec']['COG']) )
                                                {{ number_format( $months['Dec']['COG'], 2) }}
                                            @endif
                                        </span>

                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-success/10 text-success">
                                              @if(isset($months['Dec']['COG']) )
                                                {{ number_format($months['Dec']['sales'] - $months['Dec']['COG'], 2) }}
                                            @endif
                                        </span>

                                        </td>
                                    </tr>
                                    <tr class="border-t border-inherit border-solid hover:bg-gray-100 dark:hover:bg-light dark:border-defaultborder/10">
                                        <td scope="row" class="!text-start">
                                            Total
                                        </td>
                                        <td>
                                           <span style="font-size: 1.5rem"
                                                 class="badge bg-info/10  text-info">
                                        @php
                                            $totalPurchases = 0;

                                            foreach ($months as $month) {
                                                if (isset($month['purchases'])) {
                                                    $totalPurchases += (float) $month['purchases'];
                                                }
                                            }

                                            echo  number_format($totalPurchases, 2) ;

                                        @endphp
                                             </span>
                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-info/10 text-info">
                                                @php
                                                    $totalPurchases = 0;

                                                    foreach ($months as $month) {
                                                        if (isset($month['sales'])) {
                                                            $totalPurchases += (float) $month['sales'];
                                                        }
                                                    }

                                                    echo number_format($totalPurchases, 2) ;

                                                @endphp
                                        </span>

                                        </td>
                                        <td>
                                           <span style="font-size: 1.5rem"
                                                 class="badge bg-info/10  text-info">
                                        @php
                                            $totalPurchases = 0;

                                            foreach ($months as $month) {
                                                if (isset($month['COG'])) {
                                                    $totalPurchases +=  $month['COG'];
                                                }
                                            }

                                            echo  number_format($totalPurchases, 2) ;

                                        @endphp
                                             </span>
                                        </td>
                                        <td>

                                        <span style="font-size: 1.5rem"
                                              class="badge bg-info/10 text-info">
                                                @php
                                                    $totalPurchases = 0;

                                                    foreach ($months as $month) {
                                                        if (isset($month['sales'])) {
                                                            $totalPurchases +=  $month['sales']- $month['COG'];
                                                        }
                                                    }

                                                    echo number_format($totalPurchases, 2) ;

                                                @endphp
                                        </span>

                                        </td>

                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="box-footer">

                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

