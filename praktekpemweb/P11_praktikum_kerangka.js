// Bagian 1 · kerangka
// 1a. Variabel: string dan number
var namaKota = 'Yogyakarta';
var tinggiMerapi = 2910; // meter (perkiraan setelah erupsi 2010)
print('Kota:', namaKota);
print('Tinggi Merapi (km):', tinggiMerapi / 1000);
// 1b. List: indeks dimulai dari 0
var bandRGB = ['B4', 'B3', 'B2'];
print('Band merah:', bandRGB[0]);
print('Band biru:', bandRGB[2]);
print('Jumlah band RGB:', bandRGB.length);
// 1c. Dictionary (object): pasangan kunci–nilai
var sentinel2 = {
 satelit: 'Sentinel-2',
 resolusiMeter: 10,
 revisitHari: 5
};
print('Resolusi Sentinel-2 (m):', sentinel2.resolusiMeter);
print(sentinel2);
// 1d. Function: mengubah DN Sentinel-2 menjadi reflektansi
var keReflektan = function(dn) {
 return dn * 0.0001;
};
print('DN 1543 menjadi reflektansi:', keReflektan(1543));


// Bagian 2 · kerangka
var tugu = ee.Geometry.Point([110.3671, -7.7829]); // Tugu Yogyakarta
var merapi = ee.Geometry.Point([110.44611, -7.54139]); // puncak Merapi
print('Titik Tugu:', tugu);
// Jarak dihitung di server Earth Engine, dalam meter
print('Jarak Tugu ke puncak Merapi (km):', tugu.distance(merapi).divide(1000));
Map.centerObject(tugu, 11);


// Bagian 3 · kerangka
var s2 = ee.ImageCollection('COPERNICUS/S2_SR_HARMONIZED');
// Citra paling cerah musim kemarau 2025 yang menutupi Tugu.
// (filter dan sort dibahas tuntas di Pertemuan 12)
var citra = ee.Image(
 s2.filterBounds(tugu)
 .filterDate('2025-06-01', '2025-10-01')
 .filter(ee.Filter.lt('NODATA_PIXEL_PERCENTAGE', 1))
 .sort('CLOUDY_PIXEL_PERCENTAGE')
 .first()
);
print('Citra terpilih:', citra);
print('ID citra:', citra.id());
var tanggal = ee.Date(citra.get('system:time_start'));
print('Tanggal akuisisi:', tanggal.format('YYYY-MM-dd'));
print('Satelit:', citra.get('SPACECRAFT_NAME'));
print('Tile MGRS:', citra.get('MGRS_TILE'));
print('Tutupan awan (%):', citra.get('CLOUDY_PIXEL_PERCENTAGE'));
print('Nama band:', citra.bandNames());
// Ukuran piksel: tanyakan per band, karena tiap band bisa berbeda
print('Ukuran piksel B2 (m):', citra.select('B2').projection().nominalScale());
print('Ukuran piksel B5 (m):', citra.select('B5').projection().nominalScale());
print('Ukuran piksel B1 (m):', citra.select('B1').projection().nominalScale());


// Bagian 4 · kerangka
var visTrue = {
 bands: ['B4', 'B3', 'B2'], // merah, hijau, biru
 min: 0,
 max: 3000
};
Map.addLayer(citra, visTrue, 'Sentinel-2 true color');
Map.addLayer(merapi, {color: 'red'}, 'Puncak Merapi');


/*
// Bagian 5 · kerangka
var titik = ee.FeatureCollection([
 ee.Feature(air, {label: 'Air'}),
 ee.Feature(vegetasi, {label: 'Vegetasi'}),
 ee.Feature(bangunan, {label: 'Bangunan'}),
 ee.Feature(tanah, {label: 'Tanah terbuka'})
]);
Map.addLayer(titik, {color: 'yellow'}, 'Titik sampel');


// Bagian 6 · kerangka
var bandTabel = ['B2', 'B3', 'B4', 'B8', 'B11', 'SCL'];
var nilai = citra.select(bandTabel).sampleRegions({
 collection: titik,
 properties: ['label'],
 scale: 10
});
print('Nilai piksel (DN) di titik sampel:', nilai);


// Bagian 7 · kerangka
var bandGrafik = ['B2', 'B3', 'B4', 'B5', 'B6', 'B7', 'B8', 'B8A', 'B11', 'B12'];
var panjangGelombang = [497, 560, 665, 704, 740, 783, 835, 865, 1614, 2202]; // nm
var reflektan = citra.select(bandGrafik).multiply(0.0001); // DN → reflektansi
var grafik = ui.Chart.image.regions({
 image: reflektan,
 regions: titik,
 reducer: ee.Reducer.mean(),
 scale: 10,
 seriesProperty: 'label',
 xLabels: panjangGelombang
}).setChartType('LineChart').setOptions({
 title: 'Spectral signature tutupan lahan · Sentinel-2',
 hAxis: {title: 'Panjang gelombang (nm)'},
 vAxis: {title: 'Reflektansi', viewWindow: {min: 0, max: 0.7}},
 lineWidth: 3,
 pointSize: 5
});
print(grafik);
*/