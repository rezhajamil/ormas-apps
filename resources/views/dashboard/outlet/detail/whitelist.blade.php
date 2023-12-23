<div class="flex flex-col gap-6 card-list" jenis="whitelist">
    <table class="border divide-y">
        <thead class="text-xs bg-slate-800">
            <tr class="">
                <th colspan="2" class="px-3 py-1 bg-red-800 whitespace-nowrap">
                    <span class="font-bold text-white uppercase">Nasional</span>
                </th>
                <th colspan="2" class="px-3 py-1 whitespace-nowrap">
                    <span class="font-bold text-white uppercase">Lokal</span>
                </th>
            </tr>
        </thead>
        <tbody class="text-xs gap-y-1">
            <tr class="">
                <td class="px-3 py-1 pr-10 whitespace-nowrap">
                    <span class="font-bold">LH - BANJIR CUAN</span>
                </td>
                <td
                    class="px-3 py-1 text-center whitespace-nowrap {{ $detail[0]->pn_lh_banjir_cuan == 'Y' ? 'bg-green-400/50' : 'bg-red-400/50' }}">
                    <span
                        class="font-bold text-{{ $detail[0]->pn_lh_banjir_cuan == 'Y' ? 'green' : 'red' }}-600">{{ $detail[0]->pn_lh_banjir_cuan }}</span>
                </td>
                <td class="px-3 py-1 pr-10 whitespace-nowrap">
                    <span class="font-bold">ANDALAN COMSAK</span>
                </td>
                <td
                    class="px-3 py-1 text-center whitespace-nowrap {{ $detail[0]->pl_andalan_comsak == 'Y' ? 'bg-green-400/50' : 'bg-red-400/50' }}">
                    <span
                        class="font-bold text-{{ $detail[0]->pl_andalan_comsak == 'Y' ? 'green' : 'red' }}-600">{{ $detail[0]->pl_andalan_comsak }}</span>
                </td>
            </tr>
            <tr>
                <td class="px-3 py-1 pr-10 whitespace-nowrap">
                    <span class="font-bold">LH - CVM HD</span>
                </td>
                <td
                    class="px-3 py-1 text-center whitespace-nowrap {{ $detail[0]->pn_lh_cvm_hd == 'Y' ? 'bg-green-400/50' : 'bg-red-400/50' }}">
                    <span
                        class="font-bold text-{{ $detail[0]->pn_lh_cvm_hd == 'Y' ? 'green' : 'red' }}-600">{{ $detail[0]->pn_lh_cvm_hd }}</span>
                </td>
                <td class="px-3 py-1 pr-10 whitespace-nowrap">
                    <span class="font-bold">ANDALAN HOT PROMO</span>
                </td>
                <td
                    class="px-3 py-1 text-center whitespace-nowrap {{ $detail[0]->pl_andalan_hot_promo == 'Y' ? 'bg-green-400/50' : 'bg-red-400/50' }}">
                    <span
                        class="font-bold text-{{ $detail[0]->pl_andalan_hot_promo == 'Y' ? 'green' : 'red' }}-600">{{ $detail[0]->pl_andalan_hot_promo }}</span>
                </td>
            </tr>
            <tr>
                <td class="px-3 py-1 pr-10 whitespace-nowrap">
                    <span class="font-bold">LH - SO DOUBLE CUAN</span>
                </td>
                <td
                    class="px-3 py-1 text-center whitespace-nowrap {{ $detail[0]->pn_lh_so_double_cuan == 'Y' ? 'bg-green-400/50' : 'bg-red-400/50' }}">
                    <span
                        class="font-bold text-{{ $detail[0]->pn_lh_so_double_cuan == 'Y' ? 'green' : 'red' }}-600">{{ $detail[0]->pn_lh_so_double_cuan }}</span>
                </td>
                <td class="px-3 py-1 pr-10 whitespace-nowrap">
                    <span class="font-bold">TAMBUAH</span>
                </td>
                <td
                    class="px-3 py-1 text-center whitespace-nowrap {{ $detail[0]->pl_tambuah == 'Y' ? 'bg-green-400/50' : 'bg-red-400/50' }}">
                    <span
                        class="font-bold text-{{ $detail[0]->pl_tambuah == 'Y' ? 'green' : 'red' }}-600">{{ $detail[0]->pl_tambuah }}</span>
                </td>
            </tr>
            <tr>
                <td class="px-3 py-1 pr-10 whitespace-nowrap">
                    <span class="font-bold">ALL - SO REGULER</span>
                </td>
                <td
                    class="px-3 py-1 text-center whitespace-nowrap {{ $detail[0]->pn_so_reguler == 'Y' ? 'bg-green-400/50' : 'bg-red-400/50' }}">
                    <span
                        class="font-bold text-{{ $detail[0]->pn_so_reguler == 'Y' ? 'green' : 'red' }}-600">{{ $detail[0]->pn_so_reguler }}</span>
                </td>
                <td class="px-3 py-1 pr-10 whitespace-nowrap">
                    <span class="font-bold">LAPAU SA</span>
                </td>
                <td
                    class="px-3 py-1 text-center whitespace-nowrap {{ $detail[0]->pl_lapau_sa == 'Y' ? 'bg-green-400/50' : 'bg-red-400/50' }}">
                    <span
                        class="font-bold text-{{ $detail[0]->pl_lapau_sa == 'Y' ? 'green' : 'red' }}-600">{{ $detail[0]->pl_lapau_sa }}</span>
                </td>
            </tr>
            <tr>
                <td class="px-3 py-1 pr-10 whitespace-nowrap">
                    <span class="font-bold">ALL - SUPER SERU</span>
                </td>
                <td
                    class="px-3 py-1 text-center whitespace-nowrap {{ $detail[0]->pn_super_seru == 'Y' ? 'bg-green-400/50' : 'bg-red-400/50' }}">
                    <span
                        class="font-bold text-{{ $detail[0]->pn_super_seru == 'Y' ? 'green' : 'red' }}-600">{{ $detail[0]->pn_super_seru }}</span>
                </td>
                <td class="px-3 py-1 pr-10 whitespace-nowrap">
                    <span class="font-bold">ANDALAN DIGITAL</span>
                </td>
                <td
                    class="px-3 py-1 text-center whitespace-nowrap {{ $detail[0]->pl_andalan_digital == 'Y' ? 'bg-green-400/50' : 'bg-red-400/50' }}">
                    <span
                        class="font-bold text-{{ $detail[0]->pl_andalan_digital == 'Y' ? 'green' : 'red' }}-600">{{ $detail[0]->pl_andalan_digital }}</span>
                </td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td class="px-3 py-1 pr-10 whitespace-nowrap">
                    <span class="font-bold">ALL - PRODI LOKAL</span>
                </td>
                <td
                    class="px-3 py-1 text-center whitespace-nowrap {{ $detail[0]->pl_all_prodi_lokal == 'Y' ? 'bg-green-400/50' : 'bg-red-400/50' }}">
                    <span
                        class="font-bold text-{{ $detail[0]->pl_all_prodi_lokal == 'Y' ? 'green' : 'red' }}-600">{{ $detail[0]->pl_all_prodi_lokal }}</span>
                </td>
            </tr>
        </tbody>
    </table>
</div>
