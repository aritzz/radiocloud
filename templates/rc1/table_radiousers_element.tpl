                                        <tr  data-ident="{{ID}}">
                                            <td class="izena_aldatu_user" data-pk="{{ID}}" data-prr="{{ID}}">{{NAME}}</td>
                                            <td class="izena_aldatu_username" data-pk="{{ID}}">{{USERNAME}}</td>
                                            <td class="eguna_aldatu" data-type="select" data-pk="{{ID}}">{{DAY}}</td>
                                            <td class="ordua_erab_aldatu" data-pk="{{ID}}">{{HOUR}}</td>
       <td class="iraupena_aldatu" data-pk="{{ID}}">{{DURATION}}</td>
                                         <!--   <td>{{ID}}</td>-->
                                          
                                            <td>
                                                <button class="rc-delete-row btn btn-danger fa fa-trash  add-tooltip" data-toggle="tooltip" data-original-title="Ezabatu"></button>
                                                <button class="disable-user btn {{LABEL}} fa fa-minus-circle  add-tooltip" data-toggle="tooltip" data-original-title="Desaktibatu/Aktibatu"></button>
                                               <button class="disable-live btn {{LIVE}} fa fa-send  add-tooltip" data-toggle="tooltip" data-original-title="Zuzeneko emisioa aktibatu/desaktibatu"></button>
                                                <button class="aldatu_pasahitza_user btn btn-info fa fa-moon-o" value="" data-pk="{{ID}}">&nbsp;</button>
                                            </td>
                                        </tr>
