function toDecimal(coin) {
    //limpa a moeda
    coin=str_replace('R$ ','',coin);
    coin=str_replace('.','',coin);
    coin=str_replace(',','.',coin);
    coin=Number(coin);
    return coin;
}
function toReal(decimal) {
    return 'R$ '+number_format(decimal,2,',','');
}