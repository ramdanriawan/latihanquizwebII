<?php

namespace App\Settingan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Controller;

class Settingan extends Model
{
    public $funcGetArgs;
    public function __construct()
    {
        //nilai untuk setting validasi di suatu controller
        $this->setValidateRules = [
            //untuk form barang
            'barang' => [
                'nama' => 'required|min:2|max:50|alpha_num|present:alpha', //alpha sebagai penanda untuk pembuangan spasi pada method setValidate();
                'harga_jual' => 'required|numeric|digits_between:3,8|min:500|max:10000000',
                'stok'       => 'required|numeric|digits_between:1,4|min:1|max:1000',
                'gambar'     => 'max:5',
                'gambar.*'   => 'required|mimes:jpg,png,jpeg,gif|max:1000',
            ],
            //untuk form pelanggan
            'pelanggan' => [
                'nama'     => 'required|min:2|max:50|alpha|present:alpha', //alpha sebagai penanda untuk pembuangan spasi pada method setValidate();
                'umur'     => 'required|integer|min:2|max:100', //alpha sebagai penanda untuk pembuangan spasi pada method setValidate();
                'alamat'   => 'required|min:2|max:50|alpha|present:alpha', //alpha sebagai penanda untuk pembuangan spasi pada method setValidate();
                'gambar.*' => 'required|required|mimes:jpg,png,jpeg,gif|max:1000', //alpha sebagai penanda saja untuk
            ]
        ];

        //nilai untuk pluck data data
        $this->pluck = [
            'pembelian' => [
                'barangs' => ['nama', 'id']
            ],
            'penjualan' => [
                'barangs'    => ['nama', 'id'],
                'pelanggans' => ['nama', 'id']
            ]
        ];

        //event otomatis operasi column ketika store dan update
        $this->setOperation = [
            'pembelian' => [ //tabel mana
                'total_harga' => [ //akan diapakan dengan $request['column'] (*/+-) mana, (komentarin yang gak perlu)
                    'dikali'   => ['jumlah', 'harga'], //$request['total_harga'] akan dikali dengan jumlah * harga
                    // 'dibagi'   => ['jumlah', 'harga'],
                    // 'ditambah' => ['jumlah', 'harga'],
                    // 'dikurang' => ['jumlah', 'harga']
                ]
            ],

            'penjualan' => [
                'total_harga' => [ //akan diapakan dengan $request['column'] (*/+-) mana
                    'dikali'   => ['jumlah', 'harga_jual'],
                    // 'dibagi'   => ['jumlah', 'harga'],
                    // 'ditambah' => ['jumlah', 'harga'],
                    // 'dikurang' => ['jumlah', 'harga']
                ]
            ]
        ];

        //default value untuk barang
        $this->halaman = strtolower(str_replace('App\\', '', get_class(func_get_arg(0))));

        //nilai untuk setting model suatu crud
        $this->model              = func_get_arg(0);

        //nilai untuk setting pagination setiap halaman dari kumpulan data
        $this->paginate       = 5;

        //nilai untuk halaman index
        $this->halamanIndex   = "$this->halaman.index";

        //nilai untuk setting halaman create data
        $this->halamanCreate  = "$this->halaman.create";

        //nilai untuk halaman menampilkan sebuah data secara spesifik
        $this->halamanShow    = "$this->halaman.show";

        //nilai untuk halaman edit
        $this->halamanEdit    = "$this->halaman.edit";

        //untuk mengatur apakah hasil dari tabel akan ditampilkan ascending atau descending
        $this->orderByDefault = 'desc'; //desc, atau asc

        //digunakan untuk memvalidasi data yang menggunakan banyak spasi misalnya data nama dan address users
        $this->setValidateSpaces = ['alpha', 'address'];

        //nilai untuk menyimpan controller
        $this->controller         = new Controller();


        //nilai untuk mengoper banyak data dari suatu halaman
        $this->datas              = "datas";

        //nilai untuk mengoper satu data dari sebuah halamn
        $this->data               = $this->halaman;

        //data pesan success
        $this->success            = 'success';

        //data pesan errorr
        $this->error              = 'errorr';

        //nilai untuk setting pesan jika berhasil menghapus data
        $this->successDelete      = "Berhasil menghapus data $this->halaman {$this->model->nama}";

        //nilai untuk setting pesan jika berhasil menyimpan data
        $this->successStore       = "Berhasil menambah data $this->halaman {$this->model->nama}";

        //nilai untuk setting pesan jika berhasil mengedit data
        $this->successEdit        = "Berhasil mengedit data $this->halaman {$this->model->nama}";

        //nilai untuk mendefiniskan folder tempat dimana gambar akan diupload
        $this->gambarFolder       = 'gambar/';

        //nilai untuk mendefinisikan nama inputan form untuk upload gambar
        $this->gambarInput        = 'gambar';

        //nilai untuk redirect halaman setelah berhasil create data
        $this->redirectSetStore   = redirect()->route("$this->halaman.create");

        //nilai untuk redirect halaman setelah berhasil update data
        $this->redirectSetUpdate  = back();#halaman index

        //nilai untuk redirect halaman setelah berhasil menghapus data
        $this->redirectSetDestroy = back();#->halaman index

        //nilai untuk mengganti slash pada url
        $this->slashUrl = '/';

        //nilai untuk setting dimana folder root gambar
        $this->gambarIndexAt = '\\';

        //nilai untuk setting penyimpanan data dari semua gambar input multiple berupa array
        $this->gambarData = null;

        //nilai untuk menyimpan url gambar
        $this->urlGambar          = null;

        //nilai untuk menyimpan url gambar ke database
        $this->urlGambarDb          = 'url';

        //nilai untuk menyimpan except data yang tidak harus diinput
        $this->except             = ['_token', '_method'];

        //variabel untuk menyimpan nilai dari model yang akan dioper ke view
        $this->indexDatas = null;

        //variabel untuk menyimpan nilai dari tambahan user yang akan dioper ke view
        $this->allData = [];
        $this->allData['halaman'] = ucwords($this->halaman);

        //untuk mendapatkan semua model yang ada pada argument
        $this->funcGetArgs = func_get_args();

        //set auto column
        $this->setColumns();

        //set pluck data
        $this->setPluck();
    }

    // untuk mengantisipasi error has no effect pada array atau object yang tidak didefinisikan
    public function __Set($attribute, $value)
    {
        return $this->$attribute = $value;
    }

    public function __get($attribute)
    {
        return $attribute;
    }

    public function setIndex()
    {
        $this->allData[$this->datas] = $this->model->orderBy('id', $this->orderByDefault)->get();

        if($this->paginate != 0){
            $this->allData[$this->datas] = $this->model->orderBy('id', $this->orderByDefault)->paginate($this->paginate);
        }

        $this->allData['setTbody'] = $this->setTbody();
        $this->allData[$this->datas]['setEditForm'] = $this;


        return view($this->halamanIndex, $this->allData);
    }

    public function setCreate()
    {
        $this->allData[$this->datas]['setCreateForm'] = $this;

        return view($this->halamanCreate, $this->allData);
    }

    public function setStore($request)
    {
        //validasi input
        $request = $this->setValidate($request);

        //akan otomatis melakukan operasi pada column yang didefinisikan
        $this->setOperation($request);

        //simpan data inputan ke variable agar dapat diubah isinya
        $dataRequest = $request->all();

        //cek jika input mempunyai gambar
        if($request->has($this->gambarInput))
        {
            //lakukan perulangan untuk menyimpan gambar ke folder dan ke database
            foreach($request[$this->gambarInput] as $key => $value)
            {
                //simpan gambar di lokasi dan dapatkan string lokasinya
                $this->urlGambar = $this->gambarIndexAt . $request->file($this->gambarInput)[$key]->move($this->gambarFolder, $dataRequest[$this->gambarInput][$key]->getClientOriginalName());

                //simpan setiap lokasi gambarnya
                $this->gambarData[$this->urlGambarDb][] = $this->urlGambar;
            }

            //buang data yang mengandung excep input
            $dataRequest = array_diff_key($dataRequest, array_flip($this->except));

            //ubah nilai bawaan gambar menjadi json dan buang double backslashnya jika ada
            $dataRequest[$this->gambarInput] = str_replace('\\\\', $this->slashUrl,  json_encode($this->gambarData));
        }

        $this->model->create($dataRequest)->save();

        return $this->redirectSetStore->with($this->success, $this->successStore);
    }

    public function setShow($model)
    {
        return '$this->redirectS';
    }

    public function setEdit($modelId)
    {
        $this->allData[$this->data] = $modelId;
        return view($this->halamanEdit, $this->allData);
    }

    public function setUpdate($request, $modelId)
    {
        $request = $this->setValidate($request);

        //akan otomatis melakukan operasi pada column yang didefinisikan
        $this->setOperation($request);

        //simpan data inputan ke variable agar dapat diubah isinya
        $dataRequest = $request->all();

        //cek jika input mempunyai gambar
        if($request->has($this->gambarInput))
        {
            //lakukan perulangan untuk menyimpan gambar ke folder dan ke database
            foreach($request[$this->gambarInput] as $key => $value)
            {
                //simpan gambar di lokasi dan dapatkan string lokasinya
                $this->urlGambar = $this->gambarIndexAt . $request->file($this->gambarInput)[$key]->move($this->gambarFolder, $dataRequest[$this->gambarInput][$key]->getClientOriginalName());

                //simpan setiap lokasi gambarnya
                $this->gambarData[$this->urlGambarDb][] = $this->urlGambar;
            }

            //ubah nilai bawaan gambar menjadi json dan buang double backslashnya supaya bisa diinput ke database
            $dataRequest[$this->gambarInput] = str_replace('\\\\', $this->slashUrl,  json_encode($this->gambarData));
        }

        //buang data yang mengandung excep input
        $dataRequest = array_diff_key($dataRequest, array_flip($this->except));

        //update datanya setelah diedit
        $this->model->findOrFail($modelId->id)->update($dataRequest);

        //kembali ke halaman edit
        return $this->redirectSetUpdate->with($this->success, $this->successEdit);
    }

    public function setDestroy($modelId)
    {
        //cari barang dengan id
        $this->model->findOrFail($modelId->id)->delete();

        return $this->redirectSetDestroy->with($this->success, $this->successDelete);
    }

    public function setValidate($request)
    {
        //cek jika keys exist, jika tidak maka atur supaya nilanya ada tapi gak punya rules
        if(!key_exists( $this->halaman, $this->setValidateRules)){
            $this->setValidateRules[$this->halaman] = [];
        }

        //variabel sementara untuk menampung nilai request yang akan berubah (null supaya gak ikut ikutan sama $request kalo request berubah dia gak akan berubah)
        $requestTemp = null;

        //perulangan untuk memvalidasi input yang memiliki rules alpha (membuang semua spasi)
        foreach ($this->setValidateSpaces as $key => $value) {
            //buang satu persatu space berdasarkan halaman dari controllernya
            foreach ($this->setValidateRules[$this->halaman] as $key2 => $value2) {
                if(strpos($value2, $value))
                {
                    $requestTemp[$key2] = $request[$key2];
                    $request[$key2] = str_replace(' ', '', $request[$key2]);
                }
            }
        }

        //validate harus sebelum penyimpanan gambar agar form validasi gambar berhasil
         $this->controller->validate($request, $this->setValidateRules[$this->halaman]);

        foreach ($this->setValidateSpaces as $key => $value) {
            //buang satu persatu space berdasarkan halaman dari controllernya
            foreach ($this->setValidateRules[$this->halaman] as $key2 => $value2) {
                if(strpos($value2, $value))
                {
                    $request[$key2] = preg_replace('/\s\s+/', ' ', $requestTemp[$key2]);
                }
            }
        }
        // dd($request);

        return $request;
    }

    public function setOperation($request)
    {
        foreach ($this->setOperation as $key => $value)
        {
            if($key == $this->halaman)
            {
                foreach($value as $key2 => $value2)
                {
                    if(array_keys($value2)[0] == 'dikali')
                    {
                        $request[$key2] = $request[$value2['dikali'][0]] * $request[$value2['dikali'][1]];
                    }
                    elseif(array_keys($value2)[0] == 'dibagi')
                    {
                        $request[$key2] = $request[$value2['dibagi'][0]] / $request[$value2['dibagi'][1]];
                    }
                    elseif(array_keys($value2)[0] == 'ditambah')
                    {
                        $request[$key2] = $request[$value2['ditambah'][0]] + $request[$value2['ditambah'][1]];
                    }
                    elseif(array_keys($value2)[0] == 'dikurang')
                    {
                        $request[$key2] = $request[$value2['dikurang'][0]] - $request[$value2['dikurang'][1]];
                    }
                }
            }
        }
    }

    public function setColumns()
    {
        $columns = array_keys($this->model->get()->toArray()[0]);
        array_shift($columns);

        array_pop($columns);
        array_pop($columns);

        array_unshift($columns, 'No');

        array_push($columns, 'Action');

        foreach($columns as $key => $value)
        {
            $value = str_replace('_', ' ', $value);
            $columns[$key] = ucwords($value);
        }

        $this->allData['columns'] = $columns;
    }

    public function setPluck()
    {
        //untuk pluck data berdasarkan object yang ada argument construct
        foreach($this->pluck as $key => $value)
        {
            if($this->halaman == $key)
            {
                foreach($this->funcGetArgs as $key2 => $value2)
                {
                    foreach(array_keys($value) as $key3 => $value3)
                    {
                        if(strtolower($value3) == strtolower(str_replace('App\\', '', get_class($value2))).'s')
                        {
                            $this->allData[$value3] = $value2->pluck($value[strtolower(array_keys($value)[0])][0], $value[strtolower(array_keys($value)[0])][1]);
                        }
                    }
                }
            }
        }
    }

    public function setTbody()
    {
        //list variabel yang gak bisa dimasukkan ke dalam string
        $loop = 0;
        $csrf_field = csrf_field();
        $csrf_token = csrf_token();
        $html = '';

        //buat perulangan untuk setiap baris
        foreach($this->allData[$this->datas] as $key => $data){
            $loop++;

            //untuk melist data data dari
            $array = json_decode($data, true);

            //unset data yang gak perlu di dalam column
            unset($array['id'], $array['created_at'], $array['updated_at']);

            //jika sebuah halaman punya gambar maka unset gambarnya
            if(key_exists('gambar', $array))
            {
                unset($array['gambar']);
            }

            //inisialisasi baris dan data pertama
            $html .= '<tr>';
            $html .= "<td>$loop</td>";

            //tambahkan setiap kolumn dengan datanya
            foreach($array as $key => $value)
            {
                $html .= "<td> $value </td>";
            }

            //jika sebuah halaman punya gambar maka tambahkan dengan gambar
            $array2 = json_decode($data);

            if(property_exists($array2, 'gambar'))
            {
                $html .=  "
                    <td>
                        <button
                         class='btn btn-default btn-sm btn-gambar'
                         data-toggle='modal'
                         data-target='#gambarModal'
                         data-local='#carousel-generic'
                         data-link='{$data->gambar}'
                         data-gambar-nama='{$data->nama}' >
                        <i class='far fa-eye'></i> Show
                        </button>
                    </td>";
            }

            //untuk tombol edit dan delete
            $html .= "<td>
                 <span class='btn-group btn-group-sm'>
                     <button class='btn btn-primary btn-sm indexBtnEdit' data-id='{$data->id}' data-toggle='modal' data-target='#editModal{$data->id}'>
                         <i class='far fa-edit'></i>
                     </button>
                     <form id='formDelete' action='/admin/{$this->halaman}/{$data->id}' method='post'>
                         {$csrf_field}
                         <input type='hidden' name='_method' value='DELETE'>
                     </form>
                     <button form='formDelete' class='btn btn-danger btn-sm btn-delete' type='submit' data-nama='{$data->id}' data-token='{$csrf_token}'> <i class='far fa-trash-alt'></i>
                     </button>
                 </span>

            </td>";

            //tutup
            $html .= '</tr>';
        }

        //berikan hasil semua baris ke halaman
        return $html;
    }

    public function setCreateForm($errors)
    {
        $columns = Schema::getColumnListing($this->halaman.'s');

        //unset id, unset created_at, unset updated_at
        array_shift($columns);
        array_pop($columns);
        array_pop($columns);

        //kembalikan agar index jadi berurutan
        $columns = array_values($columns);

        $input = '';

        //csrf field sebagai variable biar bisa digunakan distring
        $csrf_field = csrf_field();

        //inisialisasi form
        $input .= "
            <form action='/admin/{$this->halaman}' method='post' enctype='multipart/form-data' id='{$this->halaman}Create'>
            {$csrf_field}
        ";

        foreach($columns as $column){
            $columnType = Schema::getColumnType($this->halaman.'s', $column);

            //untuk membuat jarak
            $input .= "
                <div class='form-group'>
            ";

            //label column
            $inputLabel = ucwords(str_replace('_', ' ', $column));

            if(strpos($column, '_id') !== false || strpos($column, 'id_') !== false){ //cek jika punya pluck data

                $input .= "
                    <label>{$inputLabel}</label>
                    <select class='form-control' name='{$column}'>
                    <option value='_pilih'>--Pilih {$inputLabel}--</option>
                    ";

                foreach($this->pluck[$this->halaman] as $key => $value){
                    $key = substr_replace($key, '', -1);

                    if(strpos($column, $key) !== false){

                        foreach($this->funcGetArgs as $key2 => $value2){
                            $class = strtolower(str_replace('App\\', '', get_class($value2)));
                            if($key == $class){
                                foreach($value2->pluck($value[0], $value[1]) as $key => $value){
                                    $input .= "
                                    <option value='{$key}'>{$value}</option>
                                    ";
                                }
                            }

                        };

                    }
                }

                $input .= "
                    </select>
                ";
            }
            elseif($columnType == 'string'){

                //kalo inputan berupa gambar
                if($column == 'gambar'){
                    $input .= "
                    <label>{$inputLabel}</label>
                    <input class='form-control' type='file' name='{$column}[]' multiple/>";
                }
                else{
                    $input .= "
                    <label>{$inputLabel}</label>
                    <input class='form-control' type='text' name='$column' placeholder='{$inputLabel}...'/>";
                }
            }
            elseif($columnType == 'integer'){
                $input .= "
                <label>{$inputLabel}</label>
                <input class='form-control' type='number' name='$column' placeholder='{$inputLabel}...' autocomplete='off'/>";
            }
            elseif($columnType == 'text'){
                $input .= "
                <label>{$inputLabel}</label>
                <textarea class='form-control' name='$column' placeholder='{$inputLabel}...' ></textarea>";
            }
            elseif($columnType == 'datetime'){
                $input .= "
                <label>{$inputLabel}</label>
                <input class='form-control' type='date' name='$column' placeholder='{$inputLabel}...'/>";
            }

            //penambahan jika ada error di tiap form
            if($errors->has("{$column}.*")){ //untuk cek jika ada error gambar
                $input .= "
                <p class='text-danger'>{$errors->first("{$column}.*")}</p>
                ";
            }
            elseif($errors->has($column)){
                $input .= "
                    <p class='text-danger'>{$errors->first($column)}</p>
                ";
            }

            //penutup untuk setiap jarak
            $input .= "
                </div>
            ";
        }

        //buat untuk buttonnya
        $input .= "
        <button type='submit' class='btn btn-primary btn-sm'>
                        Simpan data {$this->halaman}
                    </button>
                    <button type='reset' class='btn btn-danger btn-sm'
                            onclick='
                                if(!confirm(\"Apakah anda yakin akan mereset data ini?\"))
                                {
                                    return false;
                                }
                            '
                    >
                        Reset
                    </button>
        ";

        //close form
        $input .= '</form>';

        return $input;
    }

    public function setEditForm($errors, $data)
    {
        $columns = Schema::getColumnListing($this->halaman.'s');

        //
        $data = json_decode(json_encode($data), true);
        $id = array_shift($data);
        array_pop($data);
        array_pop($data);
        //unset id, unset created_at, unset updated_at
        array_shift($columns);
        array_pop($columns);
        array_pop($columns);

        //kembalikan agar index jadi berurutan
        $columns = array_values($columns);

        $input = '';

        //csrf field sebagai variable biar bisa digunakan distring
        $csrf_field = csrf_field();

        //inisialisasi form
        $input .= "
            <form action='/admin/$this->halaman/$id' method='post' enctype='multipart/form-data'>
            {$csrf_field}
            <input type='hidden' name='_method' value='PUT'>
        ";

        foreach($columns as $column){
            $columnType = Schema::getColumnType($this->halaman.'s', $column);

            //untuk membuat jarak
            $input .= "
                <div class='form-group'>
            ";

            //label column
            $inputLabel = ucwords(str_replace('_', ' ', $column));

            if(strpos($column, '_id') !== false || strpos($column, 'id_') !== false){ //cek jika punya pluck data

                $input .= "
                    <label>{$inputLabel}</label>
                    <select class='form-control' name='{$column}'>
                    <option value='_pilih'>--Pilih {$inputLabel}--</option>
                    ";

                foreach($this->pluck[$this->halaman] as $key => $value){
                    $key = substr_replace($key, '', -1);

                    if(strpos($column, $key) !== false){

                        foreach($this->funcGetArgs as $key2 => $value2){
                            $class = strtolower(str_replace('App\\', '', get_class($value2)));
                            if($key == $class){
                                foreach($value2->pluck($value[0], $value[1]) as $key3 => $value3){
                                    $selected = '';

                                    // print_r($data);

                                    if(key_exists("id_$key", $data)){
                                        if($data["id_$key"] == $key3){
                                            $selected = 'selected';
                                        }
                                    }

                                    $input .= "
                                    <option value='{$key3}' {$selected}>{$value3}</option>
                                    ";
                                }
                            }

                        };

                    }
                }

                $input .= "
                    </select>
                ";
            }
            elseif($columnType == 'string'){

                //kalo inputan berupa gambar
                if($column == 'gambar'){
                    $input .= "
                    <label>{$inputLabel}</label>
                    <input class='form-control' type='file' name='{$column}[]' multiple/>";
                }
                else{
                    $input .= "
                    <label>{$inputLabel}</label>
                    <input class='form-control' type='text' name='$column' placeholder='{$inputLabel}...' value='{$data[$column]}'/>";
                }
            }
            elseif($columnType == 'integer'){
                $input .= "
                <label>{$inputLabel}</label>
                <input class='form-control' type='number' name='$column' placeholder='{$inputLabel}...' value='{$data[$column]}'/>";
            }
            elseif($columnType == 'text'){
                $input .= "
                <label>{$inputLabel}</label>
                <textarea class='form-control' name='$column' placeholder='{$inputLabel}...'  value='{$data[$column]}'></textarea>";
            }
            elseif($columnType == 'datetime'){
                $input .= "
                <label>{$inputLabel}</label>
                <input class='form-control' type='date' name='$column' placeholder='{$inputLabel}...' value='{$data[$column]}'/>";
            }

            //penambahan jika ada error di tiap form
            if($errors->has("{$column}.*")){ //untuk cek jika ada error gambar
                $input .= "
                <p class='text-danger'>{$errors->first("{$column}.*")}</p>
                ";
            }
            elseif($errors->has($column)){
                $input .= "
                    <p class='text-danger'>{$errors->first($column)}</p>
                ";
            }

            //penutup untuk setiap jarak
            $input .= "
                </div>
            ";
        }

        //buat untuk buttonnya
        $input .= "
        <button type='submit' class='btn btn-primary btn-sm'>
                        Simpan data {$this->halaman}
                    </button>
                    <button type='reset' class='btn btn-danger btn-sm'
                            onclick='
                                if(!confirm(\"Apakah anda yakin akan mereset data ini?\"))
                                {
                                    return false;
                                }
                            '
                    >
                        Reset
                    </button>
        ";

        //close form
        $input .= '</form>';

        return $input;
    }
}
