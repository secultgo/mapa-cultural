<?php
namespace Goias;
use MapasCulturais\Themes\BaseV1;
use MapasCulturais\App;

class Theme extends BaseV1\Theme{

    protected static function _getTexts(){
        $app = App::i();
        $self = $app->view;
        $url_search_agents = $self->searchAgentsUrl;
        $url_search_spaces = $self->searchSpacesUrl;
        $url_search_events = $self->searchEventsUrl;
        $url_search_projects = $self->searchProjectsUrl;

        return [
            'site: name' => App::i()->config['app.siteName'],
            'site: description' => App::i()->config['app.siteDescription'],
            'site: in the region' => 'na região',
            'site: of the region' => 'da região',
            'site: owner' => 'Secretaria',
            'site: by the site owner' => 'pela Secretaria',

            'home: title' => "Bem-vind@!",
            'home: abbreviation' => "MC",
            'home: colabore' => "Colabore com o Mapas Culturais",
            'home: welcome' => "Bem-vindo ao Mapa goiano!
            Esta plataforma foi criada pelo Governo de Goiás, por meio da Secretaria de Estado de Cultura, para ser um instrumento transparente e colaborativo de gestão pública, permitindo aos gestores, agentes culturais e a todos os cidadãos conhecer, compartilhar e participar da produção e ações que integram a política cultural do Estado. 
            \nA ferramenta traz um mapeamento geral do cenário cultural de Goiás, mostrando o perfil de cada região, servindo como guia de sugestões, esclarecimentos, auxílio e orientação aos municípios goianos sobre a normatizaçao e aplicação de recursos, levando à população o acesso à produção cultural do território goiano.
            \nNavegue, se informe, contribua e intereja com a gente!",
            'home: events' => "Você pode pesquisar eventos culturais nos campos de busca combinada. Como usuário cadastrado, você pode incluir seus eventos na plataforma e divulgá-los gratuitamente.",
            'home: agents' => "Você que é artista, individual ou coletivo, ou empresa de cultura, engajado na criação, produção e promoção de atividades culturais no território goiano, faça parte desta gestão cultural e cadastre-se. Deixe suas informações, perfil, área de atuação, associando também seus eventos e espaços culturais como ponto de divulgação gratuita.Você que é artista, individual ou coletivo, ou empresa de cultura, engajado na criação, produção e promoção de atividades culturais no território goiano, faça parte desta gestão cultural e cadastre-se. Deixe suas informações, perfil, área de atuação, associando também seus eventos e espaços culturais como ponto de divulgação gratuita.",
            'home: spaces' => "Procure por espaços culturais incluídos na plataforma, acessando os campos de busca combinada que ajudam na precisão de sua pesquisa. Cadastre também os espaços onde desenvolve suas atividades artísticas e culturais.",
            'home: projects' => "Reúne projetos culturais ou agrupa eventos de todos os tipos. Neste espaço, você encontra leis de fomento, mostras, convocatórias e editais criados, além de diversas iniciativas cadastradas pelos usuários da plataforma. Cadastre-se e divulgue seus projetos.",
            'home: home_devs' => 'Existem algumas maneiras de desenvolvedores interagirem com o Mapas Culturais. A primeira é através da nossa <a href="https://github.com/hacklabr/mapasculturais/blob/master/documentation/docs/mc_config_api.md" target="_blank">API</a>. Com ela você pode acessar os dados públicos no nosso banco de dados e utilizá-los para desenvolver aplicações externas. Além disso, o Mapas Culturais é construído a partir do sofware livre <a href="http://institutotim.org.br/project/mapas-culturais/" target="_blank">Mapas Culturais</a>, criado em parceria com o <a href="http://institutotim.org.br" target="_blank">Instituto TIM</a>, e você pode contribuir para o seu desenvolvimento através do <a href="https://github.com/hacklabr/mapasculturais/" target="_blank">GitHub</a>.',

            'search: verified results' => 'Resultados Verificados',
            'search: verified' => "Verificados"
        ];
    }

    static function getThemeFolder() {
        return __DIR__;
    }

    function _init() {
        parent::_init();
        $app = App::i();
        $app->hook('view.render(<<*>>):before', function() use($app) {
            $this->_publishAssets();
        });
        $app->hook('template(site.index.home-search):end', function () {
            $this->part('aldirblanc.php');
        });        
        $app->hook('template(site.index.home-developers):end', function () {
            $this->part('parceiros.php');
        });
    }

    protected function _publishAssets() {
        $this->jsObject['assets']['logo-instituicao'] = $this->asset('img/logo-instituicao.png', false);
    }

}
