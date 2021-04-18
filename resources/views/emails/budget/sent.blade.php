<h2>Informaçõe do Orçamento</h2>

<table style="border: 1px solid black; border-collapse: collapse;">
  <tbody>
  <tr>
    <th style="padding:10px; border: 1px solid black; border-collapse: collapse; text-align: right; width: 120px;">
      Nome:
    </th>
    <td style="padding:10px; border: 1px solid black; border-collapse: collapse;">{{$name}}</td>
  </tr>

  <tr>
    <th
      style="padding:10px; padding:10px; border: 1px solid black; border-collapse: collapse; text-align: right; width: 120px;">
      E-mail:
    </th>
    <td style="padding:10px; padding:10px; border: 1px solid black; border-collapse: collapse;">{{$email}}</td>
  </tr>

  <tr>
    <th style="padding:10px; border: 1px solid black; border-collapse: collapse; text-align: right; width: 120px;">
      Telefone:
    </th>
    <td style="padding:10px; border: 1px solid black; border-collapse: collapse;">{{$phone}}</td>
  </tr>

  <tr>
    <th style="padding:10px; border: 1px solid black; border-collapse: collapse; text-align: right; width: 120px;">
      Produtos:
    </th>
    <td style="padding:10px; border: 1px solid black; border-collapse: collapse;">

      @foreach($products as $product)
        <div style="padding-bottom: 10px">
          <b>Código: </b>{{$product[0]}}
          <br>
          <b>Total: </b>{{$product[2]}} {{($product[2]=='1') ? 'unidade' : 'unidades'}}
          <br>
          <b>Observações:</b> {{$product[1]}}
        </div>
      @endforeach
    </td>
  </tr>
  </tbody>
</table>