<div class="flex flex-col gap-6 card-list" jenis="info_outlet">
    <div class="w-full overflow-hidden bg-white border-2 rounded-lg card">
        <div class="w-full px-3 py-2 text-base font-semibold text-center text-white bg-gray-500 card-header">
            {{ $outlet->nama_outlet }}
        </div>
        <div class="w-full card-body">
            <table class="w-full border-0">
                <tr>
                    <td class="px-2 py-2 text-sm font-semibold text-left uppercase border-b-2 border-r-2 text-slate-700">
                        No RS
                    </td>
                    <td class="px-2 py-2 text-sm font-semibold text-center uppercase border-b-2 text-slate-700">
                        {{ $outlet->no_rs }}
                    </td>
                </tr>
                <tr>
                    <td class="px-2 py-2 text-sm font-semibold text-left uppercase border-b-2 border-r-2 text-slate-700">
                        Nama SF
                    </td>
                    <td class="px-2 py-2 text-sm font-semibold text-center uppercase border-b-2 text-slate-700">
                        {{ $outlet->nama_sf }}
                    </td>
                </tr>
                <tr>
                    <td
                        class="px-2 py-2 text-sm font-semibold text-left uppercase border-b-2 border-r-2 text-slate-700">
                        TAP KCP
                    </td>
                    <td class="px-2 py-2 text-sm font-semibold text-center uppercase border-b-2 text-slate-700">
                        {{ $outlet->tap_kcp }}
                    </td>
                </tr>
                <tr>
                    <td
                        class="px-2 py-2 text-sm font-semibold text-left uppercase border-b-2 border-r-2 text-slate-700">
                        Cluster
                    </td>
                    <td class="px-2 py-2 text-sm font-semibold text-center uppercase border-b-2 text-slate-700">
                        {{ $outlet->cluster }}
                    </td>
                </tr>
                <tr>
                    <td
                        class="px-2 py-2 text-sm font-semibold text-left uppercase border-b-2 border-r-2 text-slate-700">
                        Kabupaten
                    </td>
                    <td class="px-2 py-2 text-sm font-semibold text-center uppercase border-b-2 text-slate-700">
                        {{ $outlet->kabupaten }}
                    </td>
                </tr>
                <tr>
                    <td
                        class="px-2 py-2 text-sm font-semibold text-left uppercase border-b-2 border-r-2 text-slate-700">
                        Kecamatan
                    </td>
                    <td class="px-2 py-2 text-sm font-semibold text-center uppercase border-b-2 text-slate-700">
                        {{ $outlet->kecamatan }}
                    </td>
                </tr>
                <tr>
                    <td
                        class="px-2 py-2 text-sm font-semibold text-left uppercase border-b-2 border-r-2 text-slate-700">
                        PJP NON PJP
                    </td>
                    <td class="px-2 py-2 text-sm font-semibold text-center uppercase border-b-2 text-slate-700">
                        {{ $outlet->pjp }}
                    </td>
                </tr>
                <tr>
                    <td
                        class="px-2 py-2 text-sm font-semibold text-left uppercase border-b-2 border-r-2 text-slate-700">
                        Kecamatan Lighthouse
                    </td>
                    <td class="px-2 py-2 text-sm font-semibold text-center uppercase border-b-2 text-slate-700">
                        {{ $outlet->kecamatan_lighthouse }}
                    </td>
                </tr>
                <tr>
                    <td class="px-2 py-2 text-sm font-semibold text-left uppercase border-r-2 text-slate-700">
                        HRC Index
                    </td>
                    <td class="px-2 py-2 text-sm font-semibold text-center uppercase text-slate-700">
                        {{ $outlet->hrc_index }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
