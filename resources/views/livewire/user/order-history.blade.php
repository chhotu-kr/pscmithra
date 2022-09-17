<div>
    <div class="tab-pane " id="download" role="tabpanel">
        <div class="order-content">
            <h3 class="account-sub-title d-none d-md-block"><i class="sicon-social-dropbox align-middle mr-3"></i>Orders
            </h3>
            <div class="tab-main">
                <!-- Nav tabs -->
                <!-- Tab panes -->

                    <div role="tabpanel" class="tab-pane " id="Section1">
                        <div class="order-table-container text-center">
                            <table class="table table-order text-left">

                                <tr>
                                    <th class="order-status">ID</th>
                                    <th class="order-status">Payment</th>
                                    <th class="order-status">Order Date</th>
                                    <th class="order-status">Price</th>
                                    <th class="order-status">Action</th>
                                </tr>

                                {{-- {{ dd($orderdata) }} --}}
                                @foreach ($orderdata as $item)
                                    <tr>
                                        <td>{{ $item['id'] }}</td>
                                        <td>{{ $item['payment'] }}</td>
                                        <td>{{ $item['dateofordered'] }}</td>
                                        <td>{{ $item['total'] }}</td>
                                        <td>
                                            <button class="btn btn-danger" wire:click.prevent="orderItem('{{ $item['slugid'] }}')">View Order Item</button>
                                        </td>

                                    </tr>
                                @endforeach

                            </table>
                    {{ $orderdata->links() }}

                        </div>

                    </div>


            </div>

        </div>
    </div>
</div>
