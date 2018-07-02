import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { UniformPoaComponent } from './uniform-poa.component';

describe('UniformPoaComponent', () => {
  let component: UniformPoaComponent;
  let fixture: ComponentFixture<UniformPoaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ UniformPoaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(UniformPoaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
