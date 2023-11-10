<div class="flex flex-col gap-6 card-list" jenis="aggressivity">
    <table class="">
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
                    <span
                        class="">{{ $detail[0]->gap_st_sp_trx >= 0 ? $detail[0]->gap_st_sp_trx : '(' . $detail[0]->gap_st_sp_trx . ')' }}</span>
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
                    <span
                        class="">{{ $detail[0]->gap_so_pair_so_sp_trx >= 0 ? $detail[0]->gap_so_pair_so_sp_trx : '(' . $detail[0]->gap_so_pair_so_sp_trx . ')' }}</span>
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
                    <span
                        class="">{{ $detail[0]->gap_so_pair_rev_so >= 0 ? $detail[0]->gap_so_pair_rev_so : '(' . $detail[0]->gap_so_pair_rev_so . ')' }}</span>
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
                    <span
                        class="">{{ $detail[0]->gap_st_vf_trx >= 0 ? $detail[0]->gap_st_vf_trx : '(' . $detail[0]->gap_st_vf_trx . ')' }}</span>
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
                    <span
                        class="">{{ $detail[0]->gap_so_pair_pair_vf_trx >= 0 ? $detail[0]->gap_so_pair_pair_vf_trx : '(' . $detail[0]->gap_so_pair_pair_vf_trx . ')' }}</span>
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
                    <span
                        class="">{{ $detail[0]->gap_so_pair_rev_pair >= 0 ? $detail[0]->gap_st_sp_trx : '(' . $detail[0]->gap_st_sp_trx . ')' }}</span>
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
                    <span class="text-green-600">{{ number_format($detail[0]->per_pair_in, 2, ',', '.') }}%</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="text-green-600">{{ number_format($detail[0]->pair_in, 0, ',', '.') }}</span>
                </td>
            </tr>
            <tr class="bg-gray-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold text-red-600">%OUTER PAIRING</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="text-red-600">{{ number_format($detail[0]->per_pair_out, 2, ',', '.') }}%</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="text-red-600">{{ number_format($detail[0]->pair_out, 0, ',', '.') }}</span>
                </td>
            </tr>
        </tbody>
    </table>
</div>
