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
            <tr class="bg-gray-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">REVENUE</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->rev_productive_full_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->rev_productive_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->rev_productive_mtd, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if (mom($detail[0]->rev_productive_mtd, $detail[0]->rev_productive_m1) < 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span
                        class="">{{ mom($detail[0]->rev_productive_mtd, $detail[0]->rev_productive_m1) }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ gap($detail[0]->rev_productive_mtd, $detail[0]->rev_productive_m1) }}</span>
                </td>
            </tr>
            <tr class="bg-sky-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">TRX CVM (5)</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_cvm_full_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_cvm_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_cvm_mtd, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if (mom($detail[0]->trx_cvm_mtd, $detail[0]->trx_cvm_m1) < 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span class="">{{ mom($detail[0]->trx_cvm_mtd, $detail[0]->trx_cvm_m1) }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ gap($detail[0]->trx_cvm_mtd, $detail[0]->trx_cvm_m1) }}</span>
                </td>
            </tr>
            <tr class="bg-sky-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">REVENUE CVM (5)</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->rev_cvm_full_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->rev_cvm_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->rev_cvm_mtd, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if (mom($detail[0]->rev_cvm_mtd, $detail[0]->rev_cvm_m1) < 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span class="">{{ mom($detail[0]->rev_cvm_mtd, $detail[0]->rev_cvm_m1) }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ gap($detail[0]->rev_cvm_mtd, $detail[0]->rev_cvm_m1) }}</span>
                </td>
            </tr>
            <tr class="bg-gray-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">TRX SUPER SERU (1)</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_super_seru_full_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_super_seru_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_super_seru_mtd, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if (mom($detail[0]->trx_super_seru_mtd, $detail[0]->trx_super_seru_m1) < 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span
                        class="">{{ mom($detail[0]->trx_super_seru_mtd, $detail[0]->trx_super_seru_m1) }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span
                        class="">{{ gap($detail[0]->trx_super_seru_mtd, $detail[0]->trx_super_seru_m1) }}</span>
                </td>
            </tr>
            <tr class="bg-gray-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">REVENUE SUPER SERU (1)</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->rev_super_seru_full_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->rev_super_seru_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->rev_super_seru_mtd, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if (mom($detail[0]->rev_super_seru_mtd, $detail[0]->rev_super_seru_m1) < 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span
                        class="">{{ mom($detail[0]->rev_super_seru_mtd, $detail[0]->rev_super_seru_m1) }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span
                        class="">{{ gap($detail[0]->rev_super_seru_mtd, $detail[0]->rev_super_seru_m1) }}</span>
                </td>
            </tr>
            <tr class="bg-sky-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">TRX COMBO SAKTI (5)</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_combo_sakti_full_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_combo_sakti_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_combo_sakti_mtd, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if (mom($detail[0]->trx_combo_sakti_mtd, $detail[0]->trx_combo_sakti_m1) < 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span
                        class="">{{ mom($detail[0]->trx_combo_sakti_mtd, $detail[0]->trx_combo_sakti_m1) }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span
                        class="">{{ gap($detail[0]->trx_combo_sakti_mtd, $detail[0]->trx_combo_sakti_m1) }}</span>
                </td>
            </tr>
            <tr class="bg-sky-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">REVENUE COMBO SAKTI (5)</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->rev_combo_sakti_full_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->rev_combo_sakti_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->rev_combo_sakti_mtd, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if (mom($detail[0]->rev_combo_sakti_mtd, $detail[0]->rev_combo_sakti_m1) < 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span
                        class="">{{ mom($detail[0]->rev_combo_sakti_mtd, $detail[0]->rev_combo_sakti_m1) }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span
                        class="">{{ gap($detail[0]->rev_combo_sakti_mtd, $detail[0]->rev_combo_sakti_m1) }}</span>
                </td>
            </tr>
            <tr class="bg-gray-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">TRX HOT PROMO (5)</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_hot_promo_full_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_hot_promo_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_hot_promo_mtd, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if (mom($detail[0]->trx_hot_promo_mtd, $detail[0]->trx_hot_promo_m1) < 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span
                        class="">{{ mom($detail[0]->trx_hot_promo_mtd, $detail[0]->trx_hot_promo_m1) }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ gap($detail[0]->trx_hot_promo_mtd, $detail[0]->trx_hot_promo_m1) }}</span>
                </td>
            </tr>
            <tr class="bg-gray-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">REVENUE HOT PROMO (5)</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->rev_hot_promo_full_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->rev_hot_promo_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->rev_hot_promo_mtd, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if (mom($detail[0]->rev_hot_promo_mtd, $detail[0]->rev_hot_promo_m1) < 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span
                        class="">{{ mom($detail[0]->rev_hot_promo_mtd, $detail[0]->rev_hot_promo_m1) }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ gap($detail[0]->rev_hot_promo_mtd, $detail[0]->rev_hot_promo_m1) }}</span>
                </td>
            </tr>
            <tr class="bg-sky-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">TRX INTERNET SAKTI (5)</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span
                        class="">{{ number_format($detail[0]->trx_internet_sakti_full_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_internet_sakti_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_internet_sakti_mtd, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if (mom($detail[0]->trx_internet_sakti_mtd, $detail[0]->trx_internet_sakti_m1) < 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span
                        class="">{{ mom($detail[0]->trx_internet_sakti_mtd, $detail[0]->trx_internet_sakti_m1) }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span
                        class="">{{ gap($detail[0]->trx_internet_sakti_mtd, $detail[0]->trx_internet_sakti_m1) }}</span>
                </td>
            </tr>
            <tr class="bg-sky-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">REVENUE INTERNET SAKTI (5)</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span
                        class="">{{ number_format($detail[0]->rev_internet_sakti_full_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->rev_internet_sakti_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->rev_internet_sakti_mtd, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if (mom($detail[0]->rev_internet_sakti_mtd, $detail[0]->rev_internet_sakti_m1) < 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span
                        class="">{{ mom($detail[0]->rev_internet_sakti_mtd, $detail[0]->rev_internet_sakti_m1) }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span
                        class="">{{ gap($detail[0]->rev_internet_sakti_mtd, $detail[0]->rev_internet_sakti_m1) }}</span>
                </td>
            </tr>
            <tr class="bg-gray-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">TRX DIGITAL (2)</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_digital_full_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_digital_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_digital_mtd, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if (mom($detail[0]->trx_digital_mtd, $detail[0]->trx_digital_m1) < 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span class="">{{ mom($detail[0]->trx_digital_mtd, $detail[0]->trx_digital_m1) }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ gap($detail[0]->trx_digital_mtd, $detail[0]->trx_digital_m1) }}</span>
                </td>
            </tr>
            <tr class="bg-gray-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">REVENUE DIGITAL</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->rev_digital_full_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->rev_digital_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->rev_digital_mtd, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if (mom($detail[0]->rev_digital_mtd, $detail[0]->rev_digital_m1) < 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span class="">{{ mom($detail[0]->rev_digital_mtd, $detail[0]->rev_digital_m1) }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ gap($detail[0]->rev_digital_mtd, $detail[0]->rev_digital_m1) }}</span>
                </td>
            </tr>
            <tr class="bg-sky-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">TRX VOICE (2)</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_voice_full_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_voice_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->trx_voice_mtd, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if (mom($detail[0]->trx_voice_mtd, $detail[0]->trx_voice_m1) < 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span class="">{{ mom($detail[0]->trx_voice_mtd, $detail[0]->trx_voice_m1) }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ gap($detail[0]->trx_voice_mtd, $detail[0]->trx_voice_m1) }}</span>
                </td>
            </tr>
            <tr class="bg-sky-100">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold">REVENUE VOICE (2)</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->rev_voice_full_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->rev_voice_m1, 0, ',', '.') }}</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ number_format($detail[0]->rev_voice_mtd, 0, ',', '.') }}</span>
                </td>
                <td class="flex items-center px-3 py-1 jusitfy-between gap-x-1 whitespace-nowrap">
                    @if (mom($detail[0]->rev_voice_mtd, $detail[0]->rev_voice_m1) < 0)
                        <i class="mr-auto text-red-700 fa-solid fa-square-caret-down"></i>
                    @else
                        <i class="mr-auto text-green-700 fa-solid fa-square-caret-up"></i>
                    @endif
                    <span class="">{{ mom($detail[0]->rev_voice_mtd, $detail[0]->rev_voice_m1) }}%</span>
                </td>
                <td class="px-3 py-1 text-center whitespace-nowrap">
                    <span class="">{{ gap($detail[0]->rev_voice_mtd, $detail[0]->rev_voice_m1) }}</span>
                </td>
            </tr>
        </tbody>
    </table>
</div>
