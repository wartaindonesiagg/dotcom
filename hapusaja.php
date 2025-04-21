<?php
// Daftar script berbahaya yang ingin dihapus
$blacklist = [
    '<script src="https://cdn.amplittlegiant.com/lazada/g.lazcdn.com/g/lzdfe/pdp-platform/0.1.22/pc.js"></script>',
    '<script src="https://cdn.amplittlegiant.com/lazada/g.lazcdn.com/g/lzdfe/pdp-modules/1.4.4/pc-mod.js"></script>',
    '<script src="https://cdn.amplittlegiant.com/lazada/g.lazcdn.com/g/aeis.alicdn.com/sd/ncpc/nc.js?t=18507"></script>',
    '<script src="https://cdn.amplittlegiant.com/lazada/g.lazcdn.com/g/alilog/mlog/aplus_int.js"></script>',
    '<script src="https://cdn.amplittlegiant.com/lazada/g.lazcdn.com/g/alilog/mlog/cloud-sdk.js"></script>',
    '<script src="https://cdn.amplittlegiant.com/lazada/g.lazcdn.com/g/retcode/cloud-sdk/bl.js"></script>',
    '<script src="https://cdn.amplittlegiant.com/lazada/g.lazcdn.com/g/lzd/assets/1.1.37/web-vitals/2.1.0/index.js"></script>',
];

// Ambil semua file .html di direktori yang sama
$files = glob("*.html");

foreach ($files as $file) {
    $contents = file_get_contents($file);
    $original = $contents;

    // Hapus setiap script dari konten file
    foreach ($blacklist as $script) {
        $contents = str_replace($script, '', $contents);
    }

    // Jika ada perubahan, timpa file-nya
    if ($contents !== $original) {
        file_put_contents($file, $contents);
        echo "✅ Script berbahaya dihapus dari file: $file\n";
    }
}
