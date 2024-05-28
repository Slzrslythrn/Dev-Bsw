<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Http\Controllers\Api\RequestFormatter;
use App\Models\MenuLayanan;
use Illuminate\Http\Request;

class MenuLayananController extends Controller
{

    function json_rpc_header($userid, $password)
    {
        date_default_timezone_set("UTC");
        $inttime = strval(time() - strtotime("1970-01-01 00:00:00"));
        $value = $userid . "&" . $inttime;
        $key = $password;
        $signature = hash_hmac("sha256", $value, $key, true);
        $signature64 = base64_encode($signature);
        $headers =
            [
                "userid:" . $userid,
                "signature:" . $signature64,
                "key:" . $inttime,
                "apikey:" . "eyJ4NXQiOiJOVGRtWmpNNFpEazNOalkwWXpjNU1tWm1PRGd3TVRFM01XWXdOREU1TVdSbFpEZzROemM0WkE9PSIsImtpZCI6ImdhdGV3YXlfY2VydGlmaWNhdGVfYWxpYXMiLCJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiJhZG1pbkBrb3RhYm9nb3IuZ28uaWQiLCJhcHBsaWNhdGlvbiI6eyJvd25lciI6ImFkbWluQGtvdGFib2dvci5nby5pZCIsInRpZXJRdW90YVR5cGUiOm51bGwsInRpZXIiOiJVbmxpbWl0ZWQiLCJuYW1lIjoiQlNXIiwiaWQiOjIwNzcsInV1aWQiOiIwMTFiMzQ1Mi1jN2EyLTRmN2UtYjM4NC0yNzllNTg5OWFmMWEifSwiaXNzIjoiaHR0cHM6XC9cL3NwbHAubGF5YW5hbi5nby5pZDo0NDNcL29hdXRoMlwvdG9rZW4iLCJ0aWVySW5mbyI6eyJCcm9uemUiOnsidGllclF1b3RhVHlwZSI6InJlcXVlc3RDb3VudCIsImdyYXBoUUxNYXhDb21wbGV4aXR5IjowLCJncmFwaFFMTWF4RGVwdGgiOjAsInN0b3BPblF1b3RhUmVhY2giOnRydWUsInNwaWtlQXJyZXN0TGltaXQiOjAsInNwaWtlQXJyZXN0VW5pdCI6bnVsbH0sIlVubGltaXRlZCI6eyJ0aWVyUXVvdGFUeXBlIjoicmVxdWVzdENvdW50IiwiZ3JhcGhRTE1heENvbXBsZXhpdHkiOjAsImdyYXBoUUxNYXhEZXB0aCI6MCwic3RvcE9uUXVvdGFSZWFjaCI6dHJ1ZSwic3Bpa2VBcnJlc3RMaW1pdCI6MCwic3Bpa2VBcnJlc3RVbml0IjpudWxsfX0sImtleXR5cGUiOiJQUk9EVUNUSU9OIiwicGVybWl0dGVkUmVmZXJlciI6IiIsInN1YnNjcmliZWRBUElzIjpbeyJzdWJzY3JpYmVyVGVuYW50RG9tYWluIjoia290YWJvZ29yLmdvLmlkIiwibmFtZSI6IktvdGFCb2dvciIsImNvbnRleHQiOiJcL3RcL2tvdGFib2dvci5nby5pZFwvS290YUJvZ29yXC8xLjAiLCJwdWJsaXNoZXIiOiJhZG1pbkBrb3RhYm9nb3IuZ28uaWQiLCJ2ZXJzaW9uIjoiMS4wIiwic3Vic2NyaXB0aW9uVGllciI6IlVubGltaXRlZCJ9LHsic3Vic2NyaWJlclRlbmFudERvbWFpbiI6ImtvdGFib2dvci5nby5pZCIsIm5hbWUiOiJCb2dvcktlcmphIiwiY29udGV4dCI6IlwvdFwva290YWJvZ29yLmdvLmlkXC9Cb2dvcktlcmphXC8xLjAiLCJwdWJsaXNoZXIiOiJhZG1pbkBrb3RhYm9nb3IuZ28uaWQiLCJ2ZXJzaW9uIjoiMS4wIiwic3Vic2NyaXB0aW9uVGllciI6IlVubGltaXRlZCJ9LHsic3Vic2NyaWJlclRlbmFudERvbWFpbiI6ImtvdGFib2dvci5nby5pZCIsIm5hbWUiOiJUUkFDS0lORy1TQUhBQkFUIiwiY29udGV4dCI6IlwvdFwva290YWJvZ29yLmdvLmlkXC9UcmFja2luZy1IaWJhaC1CYW5zb3NcLzEuMCIsInB1Ymxpc2hlciI6ImJhZy5rZXNyYUBrb3RhYm9nb3IuZ28uaWQiLCJ2ZXJzaW9uIjoiMS4wIiwic3Vic2NyaXB0aW9uVGllciI6IlVubGltaXRlZCJ9LHsic3Vic2NyaWJlclRlbmFudERvbWFpbiI6ImtvdGFib2dvci5nby5pZCIsIm5hbWUiOiJtcHBrb3RhYm9nb3IiLCJjb250ZXh0IjoiXC90XC9rb3RhYm9nb3IuZ28uaWRcL21wcGtvdGFib2dvclwvMSIsInB1Ymxpc2hlciI6ImRwbXB0c3BAa290YWJvZ29yLmdvLmlkIiwidmVyc2lvbiI6IjEiLCJzdWJzY3JpcHRpb25UaWVyIjoiQnJvbnplIn0seyJzdWJzY3JpYmVyVGVuYW50RG9tYWluIjoia290YWJvZ29yLmdvLmlkIiwibmFtZSI6IlNvbGlkQVBJIiwiY29udGV4dCI6IlwvdFwva290YWJvZ29yLmdvLmlkXC9zb2xpZFwvMC4xIiwicHVibGlzaGVyIjoiZGluc29zQGtvdGFib2dvci5nby5pZCIsInZlcnNpb24iOiIwLjEiLCJzdWJzY3JpcHRpb25UaWVyIjoiVW5saW1pdGVkIn0seyJzdWJzY3JpYmVyVGVuYW50RG9tYWluIjoia290YWJvZ29yLmdvLmlkIiwibmFtZSI6ImVTSVIiLCJjb250ZXh0IjoiXC90XC9rb3RhYm9nb3IuZ28uaWRcLzEuMFwvMS4wIiwicHVibGlzaGVyIjoiZGlua2VzQGtvdGFib2dvci5nby5pZCIsInZlcnNpb24iOiIxLjAiLCJzdWJzY3JpcHRpb25UaWVyIjoiVW5saW1pdGVkIn0seyJzdWJzY3JpYmVyVGVuYW50RG9tYWluIjoia290YWJvZ29yLmdvLmlkIiwibmFtZSI6IkFzaW5hbkJvZ29yIiwiY29udGV4dCI6IlwvdFwva290YWJvZ29yLmdvLmlkXC9Bc2luYW5Cb2dvclwvMS4wIiwicHVibGlzaGVyIjoiYmFnLnBlbUBrb3RhYm9nb3IuZ28uaWQiLCJ2ZXJzaW9uIjoiMS4wIiwic3Vic2NyaXB0aW9uVGllciI6IlVubGltaXRlZCJ9LHsic3Vic2NyaWJlclRlbmFudERvbWFpbiI6ImtvdGFib2dvci5nby5pZCIsIm5hbWUiOiJCU1ctUHVibGlrIiwiY29udGV4dCI6IlwvdFwva290YWJvZ29yLmdvLmlkXC9CU1NQdWJsaWtcLzEuMCIsInB1Ymxpc2hlciI6ImFkbWluLWRpc2tvbWluZm9Aa290YWJvZ29yLmdvLmlkIiwidmVyc2lvbiI6IjEuMCIsInN1YnNjcmlwdGlvblRpZXIiOiJVbmxpbWl0ZWQifSx7InN1YnNjcmliZXJUZW5hbnREb21haW4iOiJrb3RhYm9nb3IuZ28uaWQiLCJuYW1lIjoiUG9ydGFsLURhdGEtS290YUJvZ29yIiwiY29udGV4dCI6IlwvdFwva290YWJvZ29yLmdvLmlkXC9Qb3J0YWxEYXRhS290YUJvZ29yXC8xLjAiLCJwdWJsaXNoZXIiOiJzdGF0aXN0aWstZGlza29taW5mb0Brb3RhYm9nb3IuZ28uaWQiLCJ2ZXJzaW9uIjoiMS4wIiwic3Vic2NyaXB0aW9uVGllciI6IlVubGltaXRlZCJ9LHsic3Vic2NyaWJlclRlbmFudERvbWFpbiI6ImtvdGFib2dvci5nby5pZCIsIm5hbWUiOiJEZXN0aW5hc2lXaXNhdGEiLCJjb250ZXh0IjoiXC90XC9rb3RhYm9nb3IuZ28uaWRcL0Rlc3RpbmFzaVdpc2F0YUtvdGFCb2dvclwvMS4wIiwicHVibGlzaGVyIjoiZGlzcGFyYnVkQGtvdGFib2dvci5nby5pZCIsInZlcnNpb24iOiIxLjAiLCJzdWJzY3JpcHRpb25UaWVyIjoiVW5saW1pdGVkIn0seyJzdWJzY3JpYmVyVGVuYW50RG9tYWluIjoia290YWJvZ29yLmdvLmlkIiwibmFtZSI6IkUtTUVUUk9MT0dJIiwiY29udGV4dCI6IlwvdFwva290YWJvZ29yLmdvLmlkXC9zaWVtZXRcLzEuMCIsInB1Ymxpc2hlciI6ImRpbmt1bWttQGtvdGFib2dvci5nby5pZCIsInZlcnNpb24iOiIxLjAiLCJzdWJzY3JpcHRpb25UaWVyIjoiVW5saW1pdGVkIn0seyJzdWJzY3JpYmVyVGVuYW50RG9tYWluIjoia290YWJvZ29yLmdvLmlkIiwibmFtZSI6IkVPRkZJQ0UtS09UQUJPR09SIiwiY29udGV4dCI6IlwvdFwva290YWJvZ29yLmdvLmlkXC9FT0ZGSUNFQktBREtPVEFCT0dPUlwvMS4wIiwicHVibGlzaGVyIjoiYWRtaW5Aa290YWJvZ29yLmdvLmlkIiwidmVyc2lvbiI6IjEuMCIsInN1YnNjcmlwdGlvblRpZXIiOiJVbmxpbWl0ZWQifSx7InN1YnNjcmliZXJUZW5hbnREb21haW4iOiJrb3RhYm9nb3IuZ28uaWQiLCJuYW1lIjoiSkRJSEtvdGFCb2dvciIsImNvbnRleHQiOiJcL3RcL2tvdGFib2dvci5nby5pZFwvSkRJSEtvdGFCb2dvclwvMS4wIiwicHVibGlzaGVyIjoiYmFnLmh1a3VtQGtvdGFib2dvci5nby5pZCIsInZlcnNpb24iOiIxLjAiLCJzdWJzY3JpcHRpb25UaWVyIjoiVW5saW1pdGVkIn0seyJzdWJzY3JpYmVyVGVuYW50RG9tYWluIjoia290YWJvZ29yLmdvLmlkIiwibmFtZSI6InNpYmFkcmEiLCJjb250ZXh0IjoiXC90XC9rb3RhYm9nb3IuZ28uaWRcL3NpYmFkcmFcLzEuMCIsInB1Ymxpc2hlciI6ImFkbWluLWRpc2tvbWluZm9Aa290YWJvZ29yLmdvLmlkIiwidmVyc2lvbiI6IjEuMCIsInN1YnNjcmlwdGlvblRpZXIiOiJVbmxpbWl0ZWQifSx7InN1YnNjcmliZXJUZW5hbnREb21haW4iOiJrb3RhYm9nb3IuZ28uaWQiLCJuYW1lIjoiU2ltcGVnS290YUJnciIsImNvbnRleHQiOiJcL3RcL2tvdGFib2dvci5nby5pZFwvU2ltcGVnS290YUJnclwvMS4wIiwicHVibGlzaGVyIjoiYWRtaW5Aa290YWJvZ29yLmdvLmlkIiwidmVyc2lvbiI6IjEuMCIsInN1YnNjcmlwdGlvblRpZXIiOiJVbmxpbWl0ZWQifSx7InN1YnNjcmliZXJUZW5hbnREb21haW4iOiJrb3RhYm9nb3IuZ28uaWQiLCJuYW1lIjoic21hcnRBcGkiLCJjb250ZXh0IjoiXC90XC9rb3RhYm9nb3IuZ28uaWRcL3NtYXJ0XC8wLjEiLCJwdWJsaXNoZXIiOiJkcG1wdHNwQGtvdGFib2dvci5nby5pZCIsInZlcnNpb24iOiIwLjEiLCJzdWJzY3JpcHRpb25UaWVyIjoiVW5saW1pdGVkIn0seyJzdWJzY3JpYmVyVGVuYW50RG9tYWluIjoia290YWJvZ29yLmdvLmlkIiwibmFtZSI6IldlYnNpdGUtS29taW5mbyIsImNvbnRleHQiOiJcL3RcL2tvdGFib2dvci5nby5pZFwvS29taW5mby1Lb3RhQm9nb3JcLzEuMCIsInB1Ymxpc2hlciI6ImFkbWluQGtvdGFib2dvci5nby5pZCIsInZlcnNpb24iOiIxLjAiLCJzdWJzY3JpcHRpb25UaWVyIjoiVW5saW1pdGVkIn0seyJzdWJzY3JpYmVyVGVuYW50RG9tYWluIjoia290YWJvZ29yLmdvLmlkIiwibmFtZSI6IldlYnNpdGVEaXNwZXJ1bWtpbSIsImNvbnRleHQiOiJcL3RcL2tvdGFib2dvci5nby5pZFwvV2Vic2l0ZURpc3BlcnVta2ltXC8xLjAiLCJwdWJsaXNoZXIiOiJhZG1pbkBrb3RhYm9nb3IuZ28uaWQiLCJ2ZXJzaW9uIjoiMS4wIiwic3Vic2NyaXB0aW9uVGllciI6IlVubGltaXRlZCJ9LHsic3Vic2NyaWJlclRlbmFudERvbWFpbiI6ImtvdGFib2dvci5nby5pZCIsIm5hbWUiOiJQYW1vbmdXYWxhZ3JpIiwiY29udGV4dCI6IlwvdFwva290YWJvZ29yLmdvLmlkXC9QYW1vbmdXYWxhZ3JpXC8xLjAiLCJwdWJsaXNoZXIiOiJkaW5rZXNAa290YWJvZ29yLmdvLmlkIiwidmVyc2lvbiI6IjEuMCIsInN1YnNjcmlwdGlvblRpZXIiOiJVbmxpbWl0ZWQifSx7InN1YnNjcmliZXJUZW5hbnREb21haW4iOiJrb3RhYm9nb3IuZ28uaWQiLCJuYW1lIjoiU1NPLUtvdGFCb2dvciIsImNvbnRleHQiOiJcL3RcL2tvdGFib2dvci5nby5pZFwvU1NPXC8xLjAiLCJwdWJsaXNoZXIiOiJhZG1pbkBrb3RhYm9nb3IuZ28uaWQiLCJ2ZXJzaW9uIjoiMS4wIiwic3Vic2NyaXB0aW9uVGllciI6IlVubGltaXRlZCJ9XSwidG9rZW5fdHlwZSI6ImFwaUtleSIsInBlcm1pdHRlZElQIjoiIiwiaWF0IjoxNzEyMjAzOTg0LCJqdGkiOiJkM2RkYjg2Mi0wZDU1LTRlYTMtOWEwNS04NzY4ZjBjY2YxNjcifQ==.ifrhJX1TFmqqh0DUMvk1ySKt8ns0deBcHk03SoW9tllMaSVinNRHSOtOKFaofeAmVEV1SH6zc36AZiswRN1VPAke4aYkTiLn95cBU_w5WVaU4YjlBwsGbPu5kYU8dimxzCbyT8ZwyfHwGDn9HvgtxPOjMoqnS-rHG9tF_feNr1_tmlf5ZJMO6hmp5LqccD4TBjL0xfb-8oNax5eKE7OUEdtKMRWDuV8nii0UKIsm3B-ZsYBaz85f-Vkb-EEOGxiHajEuRpfszxAlPw2ozQ_Mh0hjPLUhMNsOw2WhUGjnlSBg0uKh8JxCeSmYcmLmhmpFmVBiyA0f0q4SOM52lpXglw=="
            ];
        return $headers;
    }

    public function index(Request $request)
    {
        $nik = $request->nik;

        // credential API cek User Terdaftar
        $user = 'kominfo';
        $pwd = '78HGygyhbjUGTDRtrtFY54cG35vVdxd78CYV8vcdfghYChjTDChjutD65xH3gC8j';
        $urlTo = "https://api-splp.layanan.go.id:443/t/kotabogor.go.id/SSO/1.0/CekUserDaftar";
        $header = $this->json_rpc_header($user, $pwd);
        $data = 'data=
        {
            "jsonrpc": "2.0",
            "method": "cek_user_terdaftar",
            "params":
            {
                "nik":"' . $nik . '",     
                "nama_aplikasi":"BSW"
            }
        }
        ';
        // end credential 

        // jika nik nya kosong
        if (!$nik) {
            $layanan = Layanan::with(['menuLayanan' => function ($q) {
                $q->where('status', 'aktif');
                $q->select('id', 'layanan_id', 'link_website', 'visit');
            }])->whereHas('menuLayanan')->get();

            return ResponseFormater::success($layanan, 'Data berhasil diambil');
        }

        $data = RequestFormatter::curl($urlTo, $data, $header);

        // jika ada index status di response APInya
        if (isset($data['status'])) {
            if ($data['status'] == 'sukses') {
                $layanan = Layanan::with(['menuLayanan' => function ($q) {
                    $q->where('status', 'aktif');
                    $q->select('id', 'layanan_id', 'link_website', 'link_sso', 'visit');
                }])->whereHas('menuLayanan')->get();

                return ResponseFormater::success($layanan, 'Data berhasil diambil');
            }
        } else {
            $layanan = Layanan::with(['menuLayanan' => function ($q) {
                $q->where('status', 'aktif');
                $q->select('id', 'layanan_id', 'link_website', 'visit');
            }])->whereHas('menuLayanan')->get();

            return ResponseFormater::success($layanan, 'Data berhasil diambil');
        }
    }

    public function kategori()
    {
        $data = Layanan::orderBy('nama_layanan', 'DESC')->get();

        return ResponseFormater::success($data, 'Data berhasil diambil');
    }

    public function menu(Request $request)
    {
        $namaLayanan = $request->nama_layanan;
        $nik = $request->nik;

        // return $namaLayanan;


        $layanan = Layanan::where('nama_layanan', $namaLayanan)->first();

        // credential API cek User Terdaftar
        $user = 'kominfo';
        $pwd = '78HGygyhbjUGTDRtrtFY54cG35vVdxd78CYV8vcdfghYChjTDChjutD65xH3gC8j';
        $urlTo = "https://api-splp.layanan.go.id:443/t/kotabogor.go.id/SSO/1.0/CekUserDaftar";
        $header = $this->json_rpc_header($user, $pwd);
        $data = 'data=
        {
            "jsonrpc": "2.0",
            "method": "cek_user_terdaftar",
            "params":
            {
                "nik":"' . $nik . '",     
                "nama_aplikasi":"BSW"
            }
        }
        ';

        // jika nik nya kosong
        if (!$nik) {
            $menu = MenuLayanan::where('layanan_id', $layanan->id)
                ->where('status', 'aktif')
                ->select('id', 'nama', 'layanan_id', 'link_website', 'icon', 'visit')
                ->get();

            return ResponseFormater::success($menu, 'Data berhasil diambil');
        }

        $data = RequestFormatter::curl($urlTo, $data, $header);

        // jika ada index status di response APInya
        if (isset($data['status'])) {
            if ($data['status'] == 'sukses') {
                $menu = MenuLayanan::where('layanan_id', $layanan->id)
                    ->where('status', 'aktif')
                    ->select('id', 'nama', 'layanan_id', 'link_website', 'link_sso', 'icon', 'visit')
                    ->get();

                return ResponseFormater::success($menu, 'Data berhasil diambil');
            }
        } else {
            $menu = MenuLayanan::where('layanan_id', $layanan->id)
                ->where('status', 'aktif')
                ->select('id', 'nama', 'layanan_id', 'link_website', 'visit', 'icon')
                ->get();

            return ResponseFormater::success($menu, 'Data berhasil diambil');
        }
    }

    public function menuTerbanyak(Request $request)
    {
        $nik = $request->nik;

        // credential API cek User Terdaftar
        $user = 'kominfo';
        $pwd = '78HGygyhbjUGTDRtrtFY54cG35vVdxd78CYV8vcdfghYChjTDChjutD65xH3gC8j';
        $urlTo = "https://api-splp.layanan.go.id:443/t/kotabogor.go.id/SSO/1.0/CekUserDaftar";
        $header = $this->json_rpc_header($user, $pwd);
        $data = 'data=
        {
            "jsonrpc": "2.0",
            "method": "cek_user_terdaftar",
            "params":
            {
                "nik":"' . $nik . '",     
                "nama_aplikasi":"BSW"
            }
        }
        ';

        // jika nik nya kosong
        if (!$nik) {
            $menu = MenuLayanan::where('status', 'aktif')
                ->select('id', 'nama', 'layanan_id', 'link_website', 'icon', 'visit')
                ->orderBy('visit', 'DESC')
                ->limit(5)
                ->get();

            return ResponseFormater::success($menu, 'Data berhasil diambil');
        }

        $data = RequestFormatter::curl($urlTo, $data, $header);

        // jika ada index status di response APInya
        if (isset($data['status'])) {
            if ($data['status'] == 'sukses') {
                $menu = MenuLayanan::where('status', 'aktif')
                    ->select('id', 'nama', 'layanan_id', 'link_website', 'link_sso', 'icon', 'visit')
                    ->orderBy('visit', 'DESC')
                    ->limit(5)
                    ->get();

                return ResponseFormater::success($menu, 'Data berhasil diambil');
            }
        } else {
            $menu = MenuLayanan::where('status', 'aktif')
                ->select('id', 'nama', 'layanan_id', 'link_website', 'visit', 'icon')
                ->orderBy('visit', 'DESC')
                ->limit(5)
                ->get();

            return ResponseFormater::success($menu, 'Data berhasil diambil');
        }
    }
}
