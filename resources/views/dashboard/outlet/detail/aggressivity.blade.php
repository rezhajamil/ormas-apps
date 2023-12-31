@php
    function convertBil($num, $decimal = 0)
    {
        $num = (int) $num;
        return number_format($num, $decimal, ',', '.');
    }
@endphp

<div class="flex flex-col min-w-[40%] gap-6 card-list w-full" jenis="aggressivity">
    <table class="w-full">
        <thead class="text-xs bg-slate-800">
            <tr class="">
                <th class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold text-white uppercase">Category</span>
                </th>
                <th class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold text-white uppercase">Full MTD-1</span>
                </th>
                <th class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold text-white uppercase">MTD-1</span>
                </th>
                <th class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold text-white uppercase">MTD</span>
                </th>
                <th class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold text-white uppercase">MOM(%)</span>
                </th>
                <th class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold text-white uppercase">GAP</span>
                </th>
            </tr>
        </thead>
        <tbody class="text-xs gap-y-1">
            <tr class="bg-sky-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">TRX ST SA (5)</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->fm_st_sp_trx, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->m1_st_sp_trx, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->mtd_st_sp_trx, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if ($detail[0]->mom_st_sp_trx <= 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span class="">{{ $detail[0]->mom_st_sp_trx }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">
                        @if ($detail[0]->gap_st_sp_trx >= 0)
                            {{ number_format($detail[0]->gap_st_sp_trx, 0, ',', '.') }}
                    </span>
                @else
                    (
                    {{ number_format($detail[0]->gap_st_sp_trx * -1, 0, ',', '.') }}</span>
                    )
                    @endif
                </td>
            </tr>
            <tr class="bg-sky-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">TRX SO SA</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->fm_so_pair_so_sp_trx, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->m1_so_pair_so_sp_trx, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->mtd_so_pair_so_sp_trx, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if ($detail[0]->mom_so_pair_so_sp_trx <= 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span class="">{{ $detail[0]->mom_so_pair_so_sp_trx }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">
                        @if ($detail[0]->gap_so_pair_so_sp_trx >= 0)
                            {{ number_format($detail[0]->gap_so_pair_so_sp_trx, 0, ',', '.') }}
                    </span>
                @else
                    (
                    {{ number_format($detail[0]->gap_so_pair_so_sp_trx * -1, 0, ',', '.') }}</span>
                    )
                    @endif
                </td>
            </tr>
            <tr class="bg-sky-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">REVENUE SO SP</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->fm_so_pair_rev_so, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->m1_so_pair_rev_so, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->mtd_so_pair_rev_so, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if ($detail[0]->mom_so_pair_rev_so <= 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span class="">{{ $detail[0]->mom_so_pair_rev_so }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">
                        @if ($detail[0]->gap_so_pair_rev_so >= 0)
                            {{ number_format($detail[0]->gap_so_pair_rev_so, 0, ',', '.') }}
                    </span>
                @else
                    (
                    {{ number_format($detail[0]->gap_so_pair_rev_so * -1, 0, ',', '.') }}</span>
                    )
                    @endif
                </td>
            </tr>

            <tr class="bg-gray-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">TRX ST VF (5)</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->fm_st_vf_trx, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->m1_st_vf_trx, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->mtd_st_vf_trx, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if ($detail[0]->mom_st_vf_trx <= 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span class="">{{ $detail[0]->mom_st_vf_trx }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">
                        @if ($detail[0]->gap_st_vf_trx >= 0)
                            {{ number_format($detail[0]->gap_st_vf_trx, 0, ',', '.') }}
                    </span>
                @else
                    (
                    {{ number_format($detail[0]->gap_st_vf_trx * -1, 0, ',', '.') }}</span>
                    )
                    @endif
                </td>
            </tr>
            <tr class="bg-gray-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">TRX SO VF</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->fm_so_pair_pair_vf_trx, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->m1_so_pair_pair_vf_trx, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->mtd_so_pair_pair_vf_trx, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if ($detail[0]->mom_so_pair_pair_vf_trx <= 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span class="">{{ $detail[0]->mom_so_pair_pair_vf_trx }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">
                        @if ($detail[0]->gap_so_pair_pair_vf_trx >= 0)
                            {{ number_format($detail[0]->gap_so_pair_pair_vf_trx, 0, ',', '.') }}
                    </span>
                @else
                    (
                    {{ number_format($detail[0]->gap_so_pair_pair_vf_trx * -1, 0, ',', '.') }}</span>
                    )
                    @endif
                </td>
            </tr>
            <tr class="bg-gray-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">REVENUE SO VF</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->fm_so_pair_rev_pair, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->m1_so_pair_rev_pair, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->mtd_so_pair_rev_pair, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if ($detail[0]->mom_so_pair_rev_pair <= 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span class="">{{ $detail[0]->mom_so_pair_rev_pair }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">
                        @if ($detail[0]->gap_so_pair_rev_pair >= 0)
                            {{ number_format($detail[0]->gap_so_pair_rev_pair, 0, ',', '.') }}
                    </span>
                @else
                    (
                    {{ number_format($detail[0]->gap_so_pair_rev_pair * -1, 0, ',', '.') }}</span>
                    )
                    @endif
                </td>
            </tr>
            <tr class="bg-gray-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold text-green-600">%INNER PAIRING</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="text-green-600">
                        @php
                            if ($detail[0]->pair_in + $detail[0]->pair_out != 0) {
                                $result = $detail[0]->pair_in / ($detail[0]->pair_in + $detail[0]->pair_out);
                            } else {
                                $result = 0;
                            }
                        @endphp
                        {{ convertBil($result * 100) }}%
                    </span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="text-green-600">{{ number_format($detail[0]->pair_in, 0, ',', '.') }}</span>
                </td>
            </tr>
            <tr class="bg-gray-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold text-red-600 whitespace-nowrap">%OUTER PAIRING</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="text-red-600">
                        @php
                            if ($detail[0]->pair_in + $detail[0]->pair_out != 0) {
                                $result = $detail[0]->pair_out / ($detail[0]->pair_in + $detail[0]->pair_out);
                            } else {
                                $result = 0;
                            }
                        @endphp
                        {{ convertBil($result * 100) }}%
                    </span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="text-red-600">{{ number_format($detail[0]->pair_out, 0, ',', '.') }}</span>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="flex justify-between mt-4 gap-x-4">
        <div class="flex flex-col min-w-[45%]">
            <span class="font-bold text-red-600 whitespace-nowrap">HISTORI ORDER VF</span>
            <table class="bg-lime-500/60">
                <tr>
                    <td><span class="px-2 text-xs font-bold">W-3</span></td>
                    <td class="text-right"><span
                            class="px-2 text-xs font-bold">{{ $detail[0]->histori_order_w_3 }}</span>
                    </td>
                </tr>
                <tr>
                    <td><span class="px-2 text-xs font-bold">W-2</span></td>
                    <td class="text-right"><span
                            class="px-2 text-xs font-bold">{{ $detail[0]->histori_order_w_2 }}</span>
                    </td>
                </tr>
                <tr>
                    <td><span class="px-2 text-xs font-bold">W-1</span></td>
                    <td class="text-right"><span
                            class="px-2 text-xs font-bold">{{ $detail[0]->histori_order_w_1 }}</span>
                    </td>
                </tr>
            </table>
        </div>
        <div class="flex flex-col min-w-[45%]">
            <span class="font-bold text-red-600 whitespace-nowrap">TARGET DIST VF WEEKLY VALIDITY</span>
            <table class="bg-lime-500/60">
                <tr>
                    <td><span class="px-2 text-xs font-bold">3D</span></td>
                    <td class="text-right">
                        <span class="px-2 text-xs font-bold">{{ $detail[0]->target_weekly_validity_3d }}</span>
                    </td>
                </tr>
                <tr>
                    <td><span class="px-2 text-xs font-bold">5D</span></td>
                    <td class="text-right">
                        <span class="px-2 text-xs font-bold">{{ $detail[0]->target_weekly_validity_5d }}</span>
                    </td>
                </tr>
                <tr>
                    <td><span class="px-2 text-xs font-bold">7D</span></td>
                    <td class="text-right">
                        <span class="px-2 text-xs font-bold">{{ $detail[0]->target_weekly_validity_7d }}</span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
