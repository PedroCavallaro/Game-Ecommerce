INSERT INTO `cliente`(`cpf_cnpj_cli`, `nome_cli`, `numero_cli`, `bairro_cli`, `cidade_cli`, `cep_cli`, `estado_cli`, `endereco_cli`) VALUES ('12312312309','Jonas','1199999999','Jd. ABC','Bragança Paulista','12345000','SP','Rua A, N 37');

INSERT INTO `vendedor`(`cpf_cnpj_vend`, `nome_vend`) VALUES ('99999999909','Lojas ABCD'), ('11111111101','Shopee');

INSERT INTO `transportadora`(`cpf_cnpj_transp`, `nome_tras`, `endereco_trans`, `numero_trans`, `bairro_trans`, `cidade_trans`, `estado_trans`, `cep_trans`) VALUES ('55555555505','Transportadora A a Z','Rua Joca, N 1','1155555555','João Penha','Bragança Paulista','SP','12345000');

INSERT INTO `produto`(`codigo_prod`, `nome_pro`, `descricao`, `valor_unitario`, `quantidade`, `peso`, `dimensoes`, `unidade_Venda`) VALUES ('1','God of War: Ragnarok','Em God of War: Ragnarok, acompanhe a jornada de Kratos e Atreus pelos Nove Reinos em busca de respostas, enquanto as forças asgardianas preparam-se para a guerra.','159,90','15','200g','17x13 cm','1'), ('2','Read Dead Redemption II','O fim da era do velho oeste começou, e as autoridades estão caçando as últimas gangues de fora da lei que restam. Os que não se rendem, nem sucumbem, são mortos.','139,70','25','200g','17x13 cm','1');

INSERT INTO `imagem`(`codigo_img`, `codigo_prod`, `nome_arquivo`) VALUES ('1','1','god_of_war_rag_1.jpg'), ('2','1','god_of_war_rag_2.jpg'), ('3','2','read_dead_redemption_II_1.jpg');