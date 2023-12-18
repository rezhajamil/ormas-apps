<div class="flex flex-col gap-6 card-list" jenis="productivity">
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
            <tr class="bg-gray-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">TRX PRODUCTIVE (5)</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->fm_productive_trx, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->m1_productive_trx, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->mtd_productive_trx, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if ($detail[0]->mom_productive_trx <= 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span class="">{{ $detail[0]->mom_productive_trx }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">
                        @if ($detail[0]->gap_productive_trx >= 0)
                            {{ number_format($detail[0]->gap_productive_trx, 0, ',', '.') }}
                    </span>
                @else
                    (
                    {{ number_format($detail[0]->gap_productive_trx * -1, 0, ',', '.') }}</span>
                    )
                    @endif
                </td>
            </tr>
            <tr class="bg-gray-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">REVENUE</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->fm_productive_rev, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->m1_productive_rev, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->mtd_productive_rev, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if ($detail[0]->mom_productive_rev <= 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span class="">{{ $detail[0]->mom_productive_rev }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">
                        @if ($detail[0]->gap_productive_rev >= 0)
                            {{ number_format($detail[0]->gap_productive_rev, 0, ',', '.') }}
                    </span>
                @else
                    (
                    {{ number_format($detail[0]->gap_productive_rev * -1, 0, ',', '.') }}</span>
                    )
                    @endif
                </td>
            </tr>
            <tr class="bg-sky-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">TRX CVM (5)</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->fm_cvm_trx, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->m1_cvm_trx, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->mtd_cvm_trx, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if ($detail[0]->mom_cvm_trx <= 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span class="">{{ $detail[0]->mom_cvm_trx }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">
                        @if ($detail[0]->gap_cvm_trx >= 0)
                            {{ number_format($detail[0]->gap_cvm_trx, 0, ',', '.') }}
                    </span>
                @else
                    (
                    {{ number_format($detail[0]->gap_cvm_trx * -1, 0, ',', '.') }}</span>
                    )
                    @endif
                </td>
            </tr>
            <tr class="bg-sky-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">REVENUE CVM (5)</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->fm_cvm_rev, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->m1_cvm_rev, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->mtd_cvm_rev, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if ($detail[0]->mom_cvm_rev <= 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span class="">{{ $detail[0]->mom_cvm_rev }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">
                        @if ($detail[0]->gap_cvm_rev >= 0)
                            {{ number_format($detail[0]->gap_cvm_rev, 0, ',', '.') }}
                    </span>
                @else
                    (
                    {{ number_format($detail[0]->gap_cvm_rev * -1, 0, ',', '.') }}</span>
                    )
                    @endif
                </td>
            </tr>
            <tr class="bg-gray-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">TRX SUPER SERU (1)</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->fm_super_seru_trx, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->m1_super_seru_trx, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->mtd_super_seru_trx, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if ($detail[0]->mom_super_seru_trx <= 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span class="">{{ $detail[0]->mom_super_seru_trx }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">
                        @if ($detail[0]->gap_super_seru_trx >= 0)
                            {{ number_format($detail[0]->gap_super_seru_trx, 0, ',', '.') }}
                    </span>
                @else
                    (
                    {{ number_format($detail[0]->gap_super_seru_trx * -1, 0, ',', '.') }}</span>
                    )
                    @endif
                </td>
            </tr>
            <tr class="bg-gray-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">REVENUE SUPER SERU (1)</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->fm_super_seru_rev, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->m1_super_seru_rev, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->mtd_super_seru_rev, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if ($detail[0]->mom_super_seru_rev <= 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span class="">{{ $detail[0]->mom_super_seru_rev }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">
                        @if ($detail[0]->gap_super_seru_rev >= 0)
                            {{ number_format($detail[0]->gap_super_seru_rev, 0, ',', '.') }}
                    </span>
                @else
                    (
                    {{ number_format($detail[0]->gap_super_seru_rev * -1, 0, ',', '.') }}</span>
                    )
                    @endif
                </td>
            </tr>
            <tr class="bg-sky-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">TRX COMBO SAKTI (5)</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->fm_combo_sakti_trx, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->m1_combo_sakti_trx, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->mtd_combo_sakti_trx, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if ($detail[0]->mom_combo_sakti_trx <= 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span class="">{{ $detail[0]->mom_combo_sakti_trx }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">
                        @if ($detail[0]->gap_combo_sakti_trx >= 0)
                            {{ number_format($detail[0]->gap_combo_sakti_trx, 0, ',', '.') }}
                    </span>
                @else
                    (
                    {{ number_format($detail[0]->gap_combo_sakti_trx * -1, 0, ',', '.') }}</span>
                    )
                    @endif
                </td>
            </tr>
            <tr class="bg-sky-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">REVENUE COMBO SAKTI (5)</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->fm_combo_sakti_rev, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->m1_combo_sakti_rev, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->mtd_combo_sakti_rev, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if ($detail[0]->mom_combo_sakti_rev <= 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span class="">{{ $detail[0]->mom_combo_sakti_rev }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">
                        @if ($detail[0]->gap_combo_sakti_rev >= 0)
                            {{ number_format($detail[0]->gap_combo_sakti_rev, 0, ',', '.') }}
                    </span>
                @else
                    (
                    {{ number_format($detail[0]->gap_combo_sakti_rev * -1, 0, ',', '.') }}</span>
                    )
                    @endif
                </td>
            </tr>
            <tr class="bg-gray-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">TRX HOT PROMO (5)</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->fm_hot_promo_trx, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->m1_hot_promo_trx, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->mtd_hot_promo_trx, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if ($detail[0]->mom_hot_promo_trx <= 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span class="">{{ $detail[0]->mom_hot_promo_trx }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">
                        @if ($detail[0]->gap_hot_promo_trx >= 0)
                            {{ number_format($detail[0]->gap_hot_promo_trx, 0, ',', '.') }}
                    </span>
                @else
                    (
                    {{ number_format($detail[0]->gap_hot_promo_trx * -1, 0, ',', '.') }}</span>
                    )
                    @endif
                </td>
            </tr>
            <tr class="bg-gray-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">REVENUE HOT PROMO (5)</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->fm_hot_promo_rev, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->m1_hot_promo_rev, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->mtd_hot_promo_rev, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if ($detail[0]->mom_hot_promo_rev <= 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span class="">{{ $detail[0]->mom_hot_promo_rev }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">
                        @if ($detail[0]->gap_hot_promo_rev >= 0)
                            {{ number_format($detail[0]->gap_hot_promo_rev, 0, ',', '.') }}
                    </span>
                @else
                    (
                    {{ number_format($detail[0]->gap_hot_promo_rev * -1, 0, ',', '.') }}</span>
                    )
                    @endif
                </td>
            </tr>
            <tr class="bg-sky-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">TRX INTERNET SAKTI (5)</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->fm_internet_sakti_trx, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->m1_internet_sakti_trx, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->mtd_internet_sakti_trx, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if ($detail[0]->mom_internet_sakti_trx <= 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span class="">{{ $detail[0]->mom_internet_sakti_trx }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">
                        @if ($detail[0]->gap_internet_sakti_trx >= 0)
                            {{ number_format($detail[0]->gap_internet_sakti_trx, 0, ',', '.') }}
                    </span>
                @else
                    (
                    {{ number_format($detail[0]->gap_internet_sakti_trx * -1, 0, ',', '.') }}</span>
                    )
                    @endif
                </td>
            </tr>
            <tr class="bg-sky-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">REVENUE INTERNET SAKTI (5)</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->fm_internet_sakti_rev, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->m1_internet_sakti_rev, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->mtd_internet_sakti_rev, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if ($detail[0]->mom_internet_sakti_rev <= 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span class="">{{ $detail[0]->mom_internet_sakti_rev }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">
                        @if ($detail[0]->gap_internet_sakti_rev >= 0)
                            {{ number_format($detail[0]->gap_internet_sakti_rev, 0, ',', '.') }}
                    </span>
                @else
                    (
                    {{ number_format($detail[0]->gap_internet_sakti_rev * -1, 0, ',', '.') }}</span>
                    )
                    @endif
                </td>
            </tr>
            <tr class="bg-gray-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">TRX DIGITAL (2)</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->fm_digital_trx, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->m1_digital_trx, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->mtd_digital_trx, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if ($detail[0]->mom_digital_trx <= 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span class="">{{ $detail[0]->mom_digital_trx }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">
                        @if ($detail[0]->gap_digital_trx >= 0)
                            {{ number_format($detail[0]->gap_digital_trx, 0, ',', '.') }}
                    </span>
                @else
                    (
                    {{ number_format($detail[0]->gap_digital_trx * -1, 0, ',', '.') }}</span>
                    )
                    @endif
                </td>
            </tr>
            <tr class="bg-gray-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">REVENUE DIGITAL</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->fm_digital_rev, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->m1_digital_rev, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->mtd_digital_rev, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if ($detail[0]->mom_digital_rev <= 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span class="">{{ $detail[0]->mom_digital_rev }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">
                        @if ($detail[0]->gap_digital_rev >= 0)
                            {{ number_format($detail[0]->gap_digital_rev, 0, ',', '.') }}
                    </span>
                @else
                    (
                    {{ number_format($detail[0]->gap_digital_rev * -1, 0, ',', '.') }}</span>
                    )
                    @endif
                </td>
            </tr>
            <tr class="bg-sky-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">TRX VOICE (2)</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->fm_voice_trx, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->m1_voice_trx, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->mtd_voice_trx, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if ($detail[0]->mom_voice_trx <= 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span class="">{{ $detail[0]->mom_voice_trx }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">
                        @if ($detail[0]->gap_voice_trx >= 0)
                            {{ number_format($detail[0]->gap_voice_trx, 0, ',', '.') }}
                    </span>
                @else
                    (
                    {{ number_format($detail[0]->gap_voice_trx * -1, 0, ',', '.') }}</span>
                    )
                    @endif
                </td>
            </tr>
            <tr class="bg-sky-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">REVENUE VOICE (2)</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->fm_voice_rev, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->m1_voice_rev, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->mtd_voice_rev, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if ($detail[0]->mom_voice_rev <= 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span class="">{{ $detail[0]->mom_voice_rev }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">
                        @if ($detail[0]->gap_voice_rev >= 0)
                            {{ number_format($detail[0]->gap_voice_rev, 0, ',', '.') }}
                    </span>
                @else
                    (
                    {{ number_format($detail[0]->gap_voice_rev * -1, 0, ',', '.') }}</span>
                    )
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>
