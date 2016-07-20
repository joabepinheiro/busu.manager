<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/application',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'login' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/login',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Auth',
                        'action'        => 'index',
                        'module'        => 'Application'
                    ),
                ),
            ),
            'logout' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/logout',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Auth',
                        'action'        => 'logout',
                        'module'        => 'Application'
                    ),
                ),
            ),
            'linha' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/linha',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Linha',
                        'action'        => 'listar',
                        'module'        => 'Application'
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:action[/:id]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => null
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'Application\Controller',
                                'controller'    => 'Linha',
                            )
                        ),
                    ),
                    'paginator' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:action/[page/:page]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'constraints' => array(
                                'page' => '\d+',
                            ),
                        ),
                    )

                ),
            ),
            'onibus' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/onibus',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Onibus',
                        'action'        => 'listar',
                        'module'        => 'Application'
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:action[/:id]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => null
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'Application\Controller',
                                'controller'    => 'Onibus',
                            )
                        ),
                    ),
                    'paginator' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:action/[page/:page]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'constraints' => array(
                                'page' => '\d+',
                            ),
                        ),
                    )

                ),
            ),
            'usuario' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/usuario',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Usuario',
                        'action'        => 'listar',
                        'module'        => 'Application'
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:action[/:id]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => null
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'Application\Controller',
                                'controller'    => 'Usuario',
                            )
                        ),
                    ),
                    'paginator' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:action/[page/:page]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'constraints' => array(
                                'page' => '\d+',
                            ),
                        ),
                    )

                ),
            ),
            'administrador' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/administrador',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Administrador',
                        'action'        => 'listar',
                        'module'        => 'Application'
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:action[/:id]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => null
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'Application\Controller',
                                'controller'    => 'Administrador',
                            )
                        ),
                    ),
                    'paginator' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:action/[page/:page]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'constraints' => array(
                                'page' => '\d+',
                            ),
                        ),
                    )

                ),
            ),
            'etiqueta' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/etiqueta',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Etiqueta',
                        'action'        => 'listar',
                        'module'        => 'Application'
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:action[/:id]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => null
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'Application\Controller',
                                'controller'    => 'Etiqueta',
                            )
                        ),
                    ),
                    'paginator' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:action/[page/:page]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'constraints' => array(
                                'page' => '\d+',
                            ),
                        ),
                    )

                ),
            ),
            'itinerario' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/itinerario',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Itinerario',
                        'action'        => 'listar',
                        'module'        => 'Application'
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:action[/:id]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => null
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'Application\Controller',
                                'controller'    => 'Itinerario',
                            )
                        ),
                    ),
                    'paginator' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:action/[page/:page]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'constraints' => array(
                                'page' => '\d+',
                            ),
                        ),
                    )

                ),
            ),
            'leitor' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/leitor',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Leitor',
                        'action'        => 'listar',
                        'module'        => 'Application'
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:action[/:id]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => null
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'Application\Controller',
                                'controller'    => 'Leitor',
                            )
                        ),
                    ),
                    'paginator' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:action/[page/:page]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'constraints' => array(
                                'page' => '\d+',
                            ),
                        ),
                    )

                ),
            ),
            'log' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/log',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Log',
                        'action'        => 'listar',
                        'module'        => 'Application'
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:action[/:id]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => null
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'Application\Controller',
                                'controller'    => 'Log',
                            )
                        ),
                    ),
                    'paginator' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:action/[page/:page]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'constraints' => array(
                                'page' => '\d+',
                            ),
                        ),
                    )

                ),
            ),
            'ponto' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/ponto',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Ponto',
                        'action'        => 'listar',
                        'module'        => 'Application'
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:action[/:id]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => null
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'Application\Controller',
                                'controller'    => 'Ponto',
                            )
                        ),
                    ),
                    'paginator' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:action/[page/:page]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'constraints' => array(
                                'page' => '\d+',
                            ),
                        ),
                    )

                ),
            ),
            'itinerário' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/itinerário',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Itinerário',
                        'action'        => 'listar',
                        'module'        => 'Application'
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:action[/:id]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => null
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'Application\Controller',
                                'controller'    => 'Itinerário',
                            )
                        ),
                    ),
                    'paginator' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:action/[page/:page]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'constraints' => array(
                                'page' => '\d+',
                            ),
                        ),
                    )

                ),
            ),

        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(
            'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
        ),
    ),

    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Home',
                'route' => 'home',
                'pages' => array(
                    array(
                        'label'  => 'Linha',
                        'route'  => 'linha/default',
                        'pages'  => array(
                            array(
                                'label'  => 'Cadastrar',
                                'route'  => 'linha/default',
                                'action' => 'cadastrar',
                            ),
                            array(
                                'label'  => 'Editar',
                                'route'  => 'linha/default',
                                'action' => 'editar',
                            ),
                            array(
                                'label'  => 'Listar',
                                'route'  => 'linha/default',
                                'action' => 'listar',
                            ),
                        )
                    ),
                    array(
                        'label'  => 'Ônibus',
                        'route'  => 'onibus/default',
                        'pages'  => array(
                            array(
                                'label'  => 'Cadastrar',
                                'route'  => 'onibus/default',
                                'action' => 'cadastrar',
                            ),
                            array(
                                'label'  => 'Editar',
                                'route'  => 'onibus/default',
                                'action' => 'editar',
                            ),
                            array(
                                'label'  => 'Listar',
                                'route'  => 'onibus/default',
                                'action' => 'listar',
                            ),
                        )
                    ),
                    array(
                        'label'  => 'Leitor',
                        'route'  => 'leitor/default',
                        'pages'  => array(
                            array(
                                'label'  => 'Cadastrar',
                                'route'  => 'leitor/default',
                                'action' => 'cadastrar',
                            ),
                            array(
                                'label'  => 'Editar',
                                'route'  => 'leitor/default',
                                'action' => 'editar',
                            ),
                            array(
                                'label'  => 'Listar',
                                'route'  => 'leitor/default',
                                'action' => 'listar',
                            ),
                        )
                    ),
                ),
            ),
        ),
    ),

    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => Controller\IndexController::class,
            'Application\Controller\Auth' => Controller\AuthController::class,
            'Application\Controller\Onibus' => Controller\OnibusController::class,
            'Application\Controller\Leitor' => Controller\LeitorController::class,
            'Application\Controller\Etiqueta' => Controller\EtiquetaController::class,
            'Application\Controller\Usuario' => Controller\UsuarioController::class,
            'Application\Controller\Administrador' => Controller\AdministradorController::class,
            'Application\Controller\Ponto' => Controller\PontoController::class,
            'Application\Controller\Linha' => Controller\LinhaController::class,
            'Application\Controller\Itinerario' => Controller\ItinerarioController::class,
            'Application\Controller\Log' => Controller\LogController::class,
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'layout/documentacao'           => __DIR__ . '/../view/layout/layout-documentacao.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
            'partial/sidebar'             => __DIR__ . '/../view/partial/sidebar.phtml',
            'partial/administrador/sidebar'             => __DIR__ . '/../view/partial/administrador/sidebar.phtml',
            'partial/consultor/sidebar'             => __DIR__ . '/../view/partial/consultor/sidebar.phtml',
            'partial/cliente/sidebar'             => __DIR__ . '/../view/partial/cliente/sidebar.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),

    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => 'Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver',
                'paths' => [__DIR__ . '/../src/']
            ],
            'odm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Document' => __NAMESPACE__ . '_driver'
                ]
            ]
        ]
    ]
);
