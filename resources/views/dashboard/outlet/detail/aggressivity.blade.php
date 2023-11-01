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
                    <span class="">{{ number_format($detail[0]->trx_productive_full_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_productive_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_productive_mtd, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if (mom($detail[0]->trx_productive_mtd, $detail[0]->trx_productive_m1) < 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span
                        class="">{{ mom($detail[0]->trx_productive_mtd, $detail[0]->trx_productive_m1) }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ gap($detail[0]->trx_productive_mtd, $detail[0]->trx_productive_m1) }}</span>
                </td>
            </tr>
            <tr class="bg-sky-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">TRX SO SA</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_productive_full_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_productive_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_productive_mtd, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if (mom($detail[0]->trx_productive_mtd, $detail[0]->trx_productive_m1) < 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span
                        class="">{{ mom($detail[0]->trx_productive_mtd, $detail[0]->trx_productive_m1) }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ gap($detail[0]->trx_productive_mtd, $detail[0]->trx_productive_m1) }}</span>
                </td>
            </tr>
            <tr class="bg-sky-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">REVENUE SO SP</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_productive_full_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_productive_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_productive_mtd, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if (mom($detail[0]->trx_productive_mtd, $detail[0]->trx_productive_m1) < 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span
                        class="">{{ mom($detail[0]->trx_productive_mtd, $detail[0]->trx_productive_m1) }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span
                        class="">{{ gap($detail[0]->trx_productive_mtd, $detail[0]->trx_productive_m1) }}</span>
                </td>
            </tr>

            <tr class="bg-gray-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">TRX ST VF (5)</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_productive_full_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_productive_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_productive_mtd, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if (mom($detail[0]->trx_productive_mtd, $detail[0]->trx_productive_m1) < 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span
                        class="">{{ mom($detail[0]->trx_productive_mtd, $detail[0]->trx_productive_m1) }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span
                        class="">{{ gap($detail[0]->trx_productive_mtd, $detail[0]->trx_productive_m1) }}</span>
                </td>
            </tr>
            <tr class="bg-gray-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">TRX SO VF</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_productive_full_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_productive_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_productive_mtd, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if (mom($detail[0]->trx_productive_mtd, $detail[0]->trx_productive_m1) < 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span
                        class="">{{ mom($detail[0]->trx_productive_mtd, $detail[0]->trx_productive_m1) }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span
                        class="">{{ gap($detail[0]->trx_productive_mtd, $detail[0]->trx_productive_m1) }}</span>
                </td>
            </tr>
            <tr class="bg-gray-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">REVENUE SO VF</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_productive_full_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_productive_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_productive_mtd, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if (mom($detail[0]->trx_productive_mtd, $detail[0]->trx_productive_m1) < 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span
                        class="">{{ mom($detail[0]->trx_productive_mtd, $detail[0]->trx_productive_m1) }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span
                        class="">{{ gap($detail[0]->trx_productive_mtd, $detail[0]->trx_productive_m1) }}</span>
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
                    <span
                        class="text-green-600">{{ number_format($detail[0]->trx_productive_mtd, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span
                        class="text-green-600">{{ number_format($detail[0]->trx_productive_mtd, 0, ',', '.') }}</span>
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
                    <span class="text-red-600">{{ number_format($detail[0]->trx_productive_mtd, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="text-red-600">{{ number_format($detail[0]->trx_productive_mtd, 0, ',', '.') }}</span>
                </td>
            </tr>
        </tbody>
    </table>
</div>
