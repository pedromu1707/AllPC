@if (count(Cart::getContent()))
                        <table class="table table-striped">
                            <thead>
                                <th>ID</th>
                                <th>{{ trans('carrito.nombre') }}</th>
                                <th>{{ trans('carrito.precio') }}</th>
                                <th>{{ trans('carrito.cantidad') }}</th>
                            </thead>
                            <tbody>

                                @foreach (Cart::getContent() as $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->price}}€</td>
                                    <td>{{$data->quantity}}</td>
                      
                                          
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                       



                        @endif

                        <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                @if(session('total'))
                                <tr>
                                    <td>{{ trans('carrito.total') }}</td>
                                    <th>{{session('total')-session('total')*0.21}}€</th>
                                </tr>
                                <tr>
                                    <td>{{ trans('carrito.descuento') }}</td>
                                    <th>{{session('total')-Cart::getTotal()}}€</th>
                                </tr>
                                @else
                                <tr>
                                    <td>{{ trans('carrito.total') }}</td>
                                    <th>{{Cart::getTotal()-Cart::getTotal()*0.21}}€</th>
                                </tr>
                                @endif
                                @if(Cart::getTotal()<=50 && Cart::getTotal()>0)
                                    <tr>
                                        <td>{{ trans('carrito.envio') }}</td>
                                        <th>10.00€</th>
                                    </tr>
                                    @elseif(Cart::getTotal()==0)
                                    <tr>
                                        <td>{{ trans('carrito.envio') }}</td>
                                        <th>0.00€</th>
                                    </tr>
                                    @else
                                    <tr>
                                        <td>{{ trans('carrito.envio') }}</td>
                                        <th>Envío Gratuito</th>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td>{{ trans('carrito.impuestos') }}</td>
                                        <th>{{Cart::getTotal()*0.21}}€</th>
                                    </tr>
                                    @if(Cart::getTotal()<=50 && Cart::getTotal()>0)
                                        <tr class="total">
                                            <td>Total</td>
                                            <td>{{Cart::getTotal()+10}}€</td>
                                        </tr>
                                        @else
                                        <tr class="total">
                                            <td>{{ trans('carrito.total2') }}</td>
                                            <td>{{Cart::getTotal()}}€</td>
                                        </tr>
                                        @endif
                                        @if(Cart::getTotal()<=50) <tr>
                                            <td>{{ trans('carrito.faltan') }} {{50-Cart::getTotal()}}€ {{ trans('carrito.enviogratis') }}</td>
                                            </tr>
                                            @else
                                            <tr>
                                                <td>{{ trans('carrito.enviogratis2') }}</td>
                                            </tr>
                                            @endif
                            </tbody>
                        </table>
                    </div>